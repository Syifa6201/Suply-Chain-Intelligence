<?php

namespace App\Services;

use App\Models\Country;
use App\Models\ShippingPort;

class ShippingPlannerService
{
    public function calculate(array $data)
{
    $origin = Country::findOrFail($data['origin_country']);
    $destination = Country::findOrFail($data['destination_country']);

    $originPort = ShippingPort::where('country_id', $origin->id)
        ->where('status', 'Operational')
        ->first();

    $destinationPort = ShippingPort::where('country_id', $destination->id)
        ->where('status', 'Operational')
        ->first();

    if (!$originPort || !$destinationPort) {
        return [
            'success' => false,
            'message' => 'Shipping port not available.'
        ];
    }

    $distance = $this->haversine(
        $originPort->latitude,
        $originPort->longitude,
        $destinationPort->latitude,
        $destinationPort->longitude
    );

    $weight = $data['weight'];
    $transport = $data['transport'];
    $priority = $data['priority'];

    /*
    |--------------------------------------------------------------------------
    | ETA
    |--------------------------------------------------------------------------
    */

    if ($transport == 'sea') {
        $speed = 550;
    } else {
        $speed = 7000;
    }

    $estimatedDays = ceil($distance / $speed);

    if ($priority == 'fastest') {
        $estimatedDays = max(1, ceil($estimatedDays * 0.80));
    }

    if ($priority == 'cheapest') {
        $estimatedDays = ceil($estimatedDays * 1.15);
    }

    /*
    |--------------------------------------------------------------------------
    | Shipping Cost
    |--------------------------------------------------------------------------
    */

    if ($transport == 'sea') {

        $cost =
            250 +
            ($distance * 0.18) +
            ($weight * 0.45);

    } else {

        $cost =
            600 +
            ($distance * 0.55) +
            ($weight * 1.20);

    }

    if ($priority == 'fastest') {
        $cost *= 1.20;
    }

    if ($priority == 'cheapest') {
        $cost *= 0.90;
    }

    /*
    |--------------------------------------------------------------------------
    | Weather
    |--------------------------------------------------------------------------
    */

    $weather = $this->weatherStatus(
        $origin->name,
        $destination->name
    );

    /*
    |--------------------------------------------------------------------------
    | Risk
    |--------------------------------------------------------------------------
    */

    $risk = $this->riskLevel(
        $origin->name,
        $destination->name
    );

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    */

    $currency = $this->currencyImpact(
        $origin->name,
        $destination->name
    );

    /*
    |--------------------------------------------------------------------------
    | AI Score
    |--------------------------------------------------------------------------
    */

    $score = 100;

    // Distance
    if ($distance > 12000) {
        $score -= 15;
    } elseif ($distance > 8000) {
        $score -= 8;
    }

    // ETA
    if ($estimatedDays > 20) {
        $score -= 12;
    } elseif ($estimatedDays > 10) {
        $score -= 6;
    }

    // Cost
    if ($cost > 10000) {
        $score -= 15;
    } elseif ($cost > 5000) {
        $score -= 8;
    }

    // Weight
    if ($weight > 10000) {
        $score -= 10;
    } elseif ($weight > 5000) {
        $score -= 5;
    }

    // Weather
switch ($weather) {

    case 'Excellent':
        $score += 8;
        break;

    case 'Good':
        $score += 3;
        break;

    case 'Moderate':
        $score -= 5;
        break;

    case 'Poor':
        $score -= 15;
        break;

    case 'Extreme':
        $score -= 25;
        break;
}

    // Risk
switch ($risk) {

    case 'Very Low':
        $score += 8;
        break;

    case 'Low':
        $score += 5;
        break;

    case 'Medium':
        $score -= 10;
        break;

    case 'High':
        $score -= 25;
        break;

    case 'Critical':
        $score -= 40;
        break;
}

    // Currency
    switch ($currency) {

        case 'Stable':
            $score += 2;
            break;

        case 'Warning':
            $score -= 5;
            break;

        case 'Critical':
            $score -= 15;
            break;
    }

    $score = max(0, min(100, round($score)));

    return [

        'success' => true,

        'origin_country' => $origin->name,

        'destination_country' => $destination->name,

        'origin_port' => $originPort->port_name,

        'destination_port' => $destinationPort->port_name,

        'origin_lat' => $originPort->latitude,

        'origin_lng' => $originPort->longitude,

        'destination_lat' => $destinationPort->latitude,

        'destination_lng' => $destinationPort->longitude,

        'distance' => round($distance, 2),

        'estimated_days' => $estimatedDays,

        'estimated_cost' => round($cost, 2),

        'shipping_score' => $score,

        'weather' => $weather,

        'risk' => $risk,

        'currency' => $currency,

        'ai_rating' => $this->rating($score),

        'ai_level' => $this->level($score),

        'insurance' => $this->insurance($score),

        'alternative_route' => $this->alternativeRoute($score),

        'carbon_emission' => $this->carbonEmission(
            $transport,
            $distance,
            $weight
        ),

        'delay_probability' => $this->delayProbability(
            $score,
            $distance
        ),

        'risk_color' => $this->riskColor($risk),

        'weather_color' => $this->weatherColor($weather),

        'currency_color' => $this->currencyColor($currency),

        'ai_summary' => $this->aiSummary(
            $score,
            $origin->name,
            $destination->name,
            $estimatedDays,
            $cost
        ),

        'recommendation' => $this->recommendation($score),
    ];
}

    /*
    |--------------------------------------------------------------------------
    | Haversine Formula
    |--------------------------------------------------------------------------
    */

    private function haversine(
        float $lat1,
        float $lon1,
        float $lat2,
        float $lon2
    ): float {

        $earthRadius = 6371;

        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);

        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(
            sqrt(
                pow(sin($latDelta / 2), 2) +
                cos($latFrom) *
                cos($latTo) *
                pow(sin($lonDelta / 2), 2)
            )
        );

        return $earthRadius * $angle;
    }

    /*
    |--------------------------------------------------------------------------
    | Weather
    |--------------------------------------------------------------------------
    */

    private function weatherStatus($origin, $destination)
{
    $excellent = [
        'Singapore',
        'Japan',
        'Germany',
        'Netherlands'
    ];

    $good = [
        'South Korea',
        'Malaysia',
        'France',
        'Canada',
        'Australia'
    ];

    if (in_array($origin, $excellent) && in_array($destination, $excellent)) {
        return 'Excellent';
    }

    if (in_array($origin, $good) || in_array($destination, $good)) {
        return 'Good';
    }

    return 'Moderate';
}

    /*
    |--------------------------------------------------------------------------
    | Risk
    |--------------------------------------------------------------------------
    */

    private function riskLevel($origin, $destination)
{
    $critical = [
        'Ukraine',
        'Russia'
    ];

    $high = [
        'Iran',
        'Israel'
    ];

    if (in_array($origin, $critical) || in_array($destination, $critical)) {
        return 'Critical';
    }

    if (in_array($origin, $high) || in_array($destination, $high)) {
        return 'High';
    }

    return 'Low';
}

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    */

    private function currencyImpact($origin, $destination)
{
    $warning = [
        'Argentina',
        'Turkey'
    ];

    if (in_array($origin, $warning) || in_array($destination, $warning)) {
        return 'Warning';
    }

    return 'Stable';
}

    /*
    |--------------------------------------------------------------------------
    | AI Recommendation
    |--------------------------------------------------------------------------
    */

    private function recommendation($score)
    {
        if ($score >= 90) {
            return 'Highly Recommended';
        }

        if ($score >= 75) {
            return 'Recommended';
        }

        if ($score >= 60) {
            return 'Use With Caution';
        }

        return 'Not Recommended';
    }

    /*
|--------------------------------------------------------------------------
| AI Rating
|--------------------------------------------------------------------------
*/

private function rating($score)
{
    if ($score >= 95) return "★★★★★";
    if ($score >= 85) return "★★★★☆";
    if ($score >= 70) return "★★★☆☆";
    if ($score >= 60) return "★★☆☆☆";

    return "★☆☆☆☆";
}

/*
|--------------------------------------------------------------------------
| AI Level
|--------------------------------------------------------------------------
*/

private function level($score)
{
    if ($score >= 95) {
        return "Excellent Route";
    }

    if ($score >= 85) {
        return "Highly Recommended";
    }

    if ($score >= 70) {
        return "Recommended";
    }

    if ($score >= 60) {
        return "Proceed With Caution";
    }

    return "Not Recommended";
}

/*
|--------------------------------------------------------------------------
| Insurance Recommendation
|--------------------------------------------------------------------------
*/

private function insurance($score)
{
    if ($score >= 90) {
        return "Optional";
    }

    if ($score >= 75) {
        return "Recommended";
    }

    return "Mandatory";
}

/*
|--------------------------------------------------------------------------
| Alternative Route
|--------------------------------------------------------------------------
*/

private function alternativeRoute($score)
{
    if ($score >= 90) {
        return "Not Required";
    }

    if ($score >= 75) {
        return "Monitor Alternative Route";
    }

    return "Use Alternative Route";
}

/*
|--------------------------------------------------------------------------
| Carbon Emission
|--------------------------------------------------------------------------
*/

private function carbonEmission($transport, $distance, $weight)
{
    if ($transport == "sea") {

        $co2 = $distance * $weight * 0.000015;

    } else {

        $co2 = $distance * $weight * 0.000090;

    }

    return round($co2, 2);
}

/*
|--------------------------------------------------------------------------
| Delay Probability
|--------------------------------------------------------------------------
*/

private function delayProbability($score, $distance)
{
    $delay = 100 - $score;

    if ($distance > 10000) {
        $delay += 10;
    }

    if ($distance > 15000) {
        $delay += 5;
    }

    return min($delay, 95);
}

/*
|--------------------------------------------------------------------------
| Logistics Efficiency
|--------------------------------------------------------------------------
*/

private function logisticsEfficiency($score)
{
    if ($score >= 90) {
        return "Excellent";
    }

    if ($score >= 80) {
        return "High";
    }

    if ($score >= 70) {
        return "Good";
    }

    if ($score >= 60) {
        return "Average";
    }

    return "Low";
}

/*
|--------------------------------------------------------------------------
| Sustainability
|--------------------------------------------------------------------------
*/

private function sustainability($transport)
{
    if ($transport == 'sea') {
        return "Eco Friendly";
    }

    return "High Carbon Footprint";
}

/*
|--------------------------------------------------------------------------
| Shipment Priority
|--------------------------------------------------------------------------
*/

private function shipmentPriority($priority)
{
    return match ($priority) {

        'fastest' => 'High Priority',

        'balanced' => 'Standard Priority',

        'cheapest' => 'Economic Priority',

        default => 'Standard Priority',

    };
}

/*
|--------------------------------------------------------------------------
| Route Complexity
|--------------------------------------------------------------------------
*/

private function routeComplexity($distance)
{
    if ($distance < 3000) {
        return "Simple";
    }

    if ($distance < 8000) {
        return "Medium";
    }

    if ($distance < 12000) {
        return "Complex";
    }

    return "Very Complex";
}

/*
|--------------------------------------------------------------------------
| AI Confidence
|--------------------------------------------------------------------------
*/

private function confidence($score)
{
    if ($score >= 90) {
        return 98;
    }

    if ($score >= 80) {
        return 94;
    }

    if ($score >= 70) {
        return 90;
    }

    if ($score >= 60) {
        return 84;
    }

    return 72;
}

/*
|--------------------------------------------------------------------------
| Risk Color
|--------------------------------------------------------------------------
*/

private function riskColor($risk)
{
    return match ($risk) {

        'Very Low' => 'success',

        'Low' => 'success',

        'Medium' => 'warning',

        'High' => 'danger',

        'Critical' => 'dark',

        default => 'secondary',

    };
}

/*
|--------------------------------------------------------------------------
| Weather Color
|--------------------------------------------------------------------------
*/

private function weatherColor($weather)
{
    return match ($weather) {

        'Excellent' => 'success',

        'Good' => 'success',

        'Moderate' => 'warning',

        'Poor' => 'danger',

        'Extreme' => 'dark',

        default => 'secondary',

    };
}

/*
|--------------------------------------------------------------------------
| Currency Color
|--------------------------------------------------------------------------
*/

private function currencyColor($currency)
{
    return match ($currency) {

        'Stable' => 'success',

        'Warning' => 'warning',

        'Critical' => 'danger',

        default => 'secondary',

    };
}

/*
|--------------------------------------------------------------------------
| AI Summary
|--------------------------------------------------------------------------
*/

private function aiSummary(
    $score,
    $origin,
    $destination,
    $eta,
    $cost
)
{
    if ($score >= 95) {

        return "AI analysis indicates an excellent international shipping route from {$origin} to {$destination}. The logistics network is highly efficient with minimal operational risk. Estimated delivery is {$eta} days and the projected shipping cost is USD " . number_format($cost, 2) . ". This shipment is strongly recommended.";

    }

    if ($score >= 85) {

        return "The selected route is highly recommended. Current logistics conditions are stable and the shipment is expected to arrive in approximately {$eta} days. Estimated transportation cost is USD " . number_format($cost, 2) . ". Continue monitoring weather and port activities.";

    }

    if ($score >= 70) {

        return "The shipment is feasible with moderate operational risk. AI recommends monitoring weather forecasts, customs clearance, and port congestion before departure. Estimated delivery time is {$eta} days.";

    }

    if ($score >= 60) {

        return "Several operational risks have been identified. Additional cargo insurance, continuous shipment tracking, and contingency planning are recommended to minimize delays.";

    }

    return "AI does not recommend proceeding with this shipment at the current time. High operational risks may significantly impact delivery performance. Consider selecting another route, transport mode, or shipment schedule.";
}
}
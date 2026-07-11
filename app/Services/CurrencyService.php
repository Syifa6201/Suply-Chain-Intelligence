<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{
    public function getRate($currency = 'USD')
    {
        try {

            $response = Http::timeout(20)
                ->get('https://open.er-api.com/v6/latest/USD');

            if (!$response->successful()) {
                return null;
            }

            $data = $response->json();

            $rate = $data['rates'][$currency] ?? null;

            if (!$rate) {
                return null;
            }

            return [

                'base' => $data['base_code'] ?? 'USD',

                'currency' => $currency,

                'rate' => $rate,

                'updated_at' => $data['time_last_update_utc'] ?? null,

                'status' => $this->getStatus($rate),

                'color' => $this->getColor($rate)

            ];

        } catch (\Exception $e) {

            return null;

        }
    }

    private function getStatus($rate)
    {
        if ($rate < 1) {
            return 'Strong';
        }

        if ($rate < 10) {
            return 'Stable';
        }

        return 'Weak';
    }

    private function getColor($rate)
    {
        if ($rate < 1) {
            return 'success';
        }

        if ($rate < 10) {
            return 'primary';
        }

        return 'warning';
    }
}
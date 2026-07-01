<?php

namespace App\Services;

class RiskService
{
    public function calculate($weather,$currency,$news,$economy)
    {
        $score =
            ($weather * 0.25) +
            ($currency * 0.20) +
            ($news * 0.30) +
            ($economy * 0.25);

        return round($score,2);
    }

    public function level($score)
    {
        if ($score >= 70) {
            return "HIGH";
        }

        if ($score >= 40) {
            return "MEDIUM";
        }

        return "LOW";
    }

    public function recommendation($level)
    {
        if ($level == "HIGH") {
            return "Delay shipment and monitor supply chain carefully.";
        }

        if ($level == "MEDIUM") {
            return "Monitor market and prepare contingency plan.";
        }

        return "Supply chain stable.";
    }
}
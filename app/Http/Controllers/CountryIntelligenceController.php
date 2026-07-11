<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\WeatherService;
use App\Services\EconomyService;
use App\Services\CurrencyService;
use App\Services\NewsService;
use App\Services\CountryStatisticService;
use App\Services\RiskEngineService;
use App\Services\RecommendationService;
use App\Services\PortStatusService;
use App\Services\WorldBankHistoryService;
use App\Services\TradePotentialService;
use App\Services\TradeAnalysisService;
use App\Services\SupplyChainScoreService;

class CountryIntelligenceController extends Controller
{
    public function show(
        $country,
        WeatherService $weatherService,
        EconomyService $economyService,
        CurrencyService $currencyService,
        NewsService $newsService,
        CountryStatisticService $statisticService,
        RiskEngineService $riskEngine,
        RecommendationService $recommendationService,
        PortStatusService $portStatusService,
        WorldBankHistoryService $historyService,
        TradePotentialService $tradePotentialService,
        TradeAnalysisService $tradeAnalysisService,
        SupplyChainScoreService $scoreService,
    ) {

        $country = urldecode(trim($country));

        $countryData = Country::with('ports')
            ->where('code', strtoupper($country))
            ->firstOrFail();

        $info = [

            'lat'       => $countryData->latitude,
            'lon'       => $countryData->longitude,
            'code'      => $countryData->iso3,
            'currency'  => $countryData->currency,
            'capital'   => $countryData->capital,
            'region'    => $countryData->region,
            'language'  => $countryData->language,
            'flag'      => $countryData->flag,

        ];

        $weather = $weatherService->getCurrentWeather(
            $info['lat'],
            $info['lon']
        );

        $economy = $economyService->getCountryEconomy(
            $info['code']
        );

        $currency = $currencyService->getRate(
            $info['currency']
        );

        $news = $newsService->getCountryNews($country);

        $statistics = $statisticService->getStatistics(
            $info['code']
        );

        $tradeTrend = $historyService->getTradeHistory(
            $info['code']
        );

        $risk = $riskEngine->calculate(
            $weather,
            $statistics,
            $news
        );

        $recommendation = $recommendationService->generate(
            $risk,
            $weather,
            $news
        );

        $tradePotential = $tradePotentialService->analyze(
            $statistics,
            $risk,
            $news
        );

        $tradeAnalysis = $tradeAnalysisService->analyze(
            $statistics
        );

        $supplyScore = $scoreService->calculate(
            $statistics,
            $risk,
            $tradeAnalysis
        );
        $ports = $countryData->ports;

        foreach ($ports as $port) {

            $summary = $portStatusService->calculate(
                $port,
                $weather,
                $risk,
                $news
            );

            $port->current_status = $summary['status'];
            $port->current_congestion = $summary['congestion'];
        }

        $portSummary = [

            'status' => '-',
            'congestion' => 0,
            'capacity' => 0

        ];

        if ($ports->count()) {

            $portSummary = [

                'status' => $ports->first()->current_status,
                'congestion' => round($ports->avg('current_congestion')),
                'capacity' => $ports->sum('capacity')

            ];
        }

        return view('country.show', compact(

            'country',
            'info',
            'weather',
            'economy',
            'currency',
            'statistics',
            'tradeTrend',
            'risk',
            'recommendation',
            'news',
            'ports',
            'portSummary',
            'tradePotential',
            'tradeAnalysis',
            'supplyScore',

        ));
    }
}
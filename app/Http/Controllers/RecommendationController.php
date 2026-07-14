<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\RecommendationService;
use App\Models\RecommendationHistory;
use App\Services\TradePredictionService;
use App\Models\TradePrediction;

class RecommendationController extends Controller
{
    public function index(
RecommendationService $ai
)
{

    $countries=Country::orderBy('name')->get();

    $results=[];

    foreach ($countries as $country) {

    $data = $ai->calculateTradeScore($country);

    $results[] = [

        'country' => $country,

        'score' => $data['score'],

        'confidence' => $data['confidence'],

        'reason' => $data['reason'],

        'badge' => $data['badge'],

        'recommendation' => $data['recommendation'],

        'ai' => $data,

    ];

}

    usort($results,function($a,$b){

        return

        $b['ai']['score']

        <=>

        $a['ai']['score'];

    });

    $highestRisk = collect($results)

->sortBy('score')

->first();

return view(

'recommendation.index',

compact(

'results',

'highestRisk'

)

);

}

public function show(
Country $country,
RecommendationService $ai
)
{

$analysis=$ai->calculateTradeScore($country);



RecommendationHistory::create([

    'country_id'=>$country->id,

    'score'=>$analysis['score'],

    'confidence'=>$analysis['confidence'],

    'recommendation'=>$analysis['recommendation'],

    'reason'=>$analysis['reason']

]);



return view(

'recommendation.show',

compact(

'country',

'analysis'

)

);

}
}
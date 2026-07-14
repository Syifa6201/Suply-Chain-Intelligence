<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [

        'country_id',

        'weather_score',

        'currency_score',

        'economy_score',

        'port_score',

        'news_score',

        'risk_score',

        'recommendation_score',

        'recommendation',

        'confidence',

        'reason'

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
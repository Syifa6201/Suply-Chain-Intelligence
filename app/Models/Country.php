<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CountryStatistic;
use App\Models\Port;
use App\Models\Vessel;


class Country extends Model
{

    protected $fillable = [

        'name',
        'iso2',
        'iso3',
        'capital',
        'currency',
        'region',
        'latitude',
        'longitude',
        'flag'

    ];



    public function statistic()
    {
        return $this->hasOne(
            CountryStatistic::class
        );
    }



    public function ports()
    {
        return $this->hasMany(
            Port::class
        );
    }



    public function vessels()
    {
        return $this->hasMany(
            Vessel::class
        );
    }

    public function recommendation()
{
    return $this->hasOne(Recommendation::class);
}

public function recommendationHistories()
{

    return $this->hasMany(
        RecommendationHistory::class
    );

}

public function watchlists()
{
    return $this->hasMany(
        Watchlist::class
    );
}


}
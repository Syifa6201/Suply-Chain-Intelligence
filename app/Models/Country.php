<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CountryStatistic;

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
        return $this->hasOne(CountryStatistic::class);
    }

    public function ports()
{
    return $this->hasMany(Port::class);
}

}
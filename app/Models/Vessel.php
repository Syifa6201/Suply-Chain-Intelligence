<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $fillable = [

        'imo',

        'name',

        'country_id',

        'latitude',

        'longitude',

        'destination',

        'current_port',

        'status',

        'speed',

        'heading',

        'cargo',

        'capacity',

        'eta',

        'risk_score'

    ];

    protected $casts = [

        'eta' => 'datetime',

        'latitude' => 'float',

        'longitude' => 'float',

        'capacity' => 'integer',

        'speed' => 'integer',

        'risk_score' => 'integer',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function port()
    {
        return $this->belongsTo(
            Port::class,
            'current_port',
            'name'
        );
    }
}
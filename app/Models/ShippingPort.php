<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingPort extends Model
{
    protected $fillable = [

        'country_id',

        'port_name',

        'city',

        'code',

        'latitude',

        'longitude',

        'capacity',

        'status',

        'international'

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
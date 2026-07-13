<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingLane extends Model
{

    protected $fillable=[

        'name',
        'region',
        'risk_level',
        'active_vessel',
        'coordinates'

    ];


    protected $casts=[

        'coordinates'=>'array'

    ];

    public function tradeRisks()
{

    return $this->hasMany(
        TradeRisk::class
    );

}

}
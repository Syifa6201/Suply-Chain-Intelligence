<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeRisk extends Model
{


protected $fillable=[


    'shipping_lane_id',

    'risk_score',

    'risk_level',

    'vessel_risk',

    'port_risk',

    'weather_risk',

    'currency_risk',

    'analysis',

    'recommendation'


];



public function shippingLane()
{

    return $this->belongsTo(
        ShippingLane::class
    );

}


}
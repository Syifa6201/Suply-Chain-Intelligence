<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Port extends Model
{


protected $fillable=[


'name',

'country_id',

'latitude',

'longitude',

'terminal',

'type',

'capacity',

'congestion',

'status',

'risk_score'


];




public function country()
{

return $this->belongsTo(
Country::class
);

}



}
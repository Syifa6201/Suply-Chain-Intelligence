<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradePrediction extends Model
{

protected $fillable=[

'country_id',

'current_score',

'predicted_score',

'trend',

'confidence',

'explanation'

];


public function country()
{

return $this->belongsTo(
Country::class
);

}


}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecommendationHistory extends Model
{

    protected $fillable=[

        'country_id',

        'score',

        'confidence',

        'recommendation',

        'reason'

    ];



    public function country()
    {

        return $this->belongsTo(
            Country::class
        );

    }

}
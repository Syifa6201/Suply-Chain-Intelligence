<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{

    protected $fillable=[

        'user_id',

        'language',

        'theme',

        'sidebar',

        'email_notification',

        'weather_alert',

        'currency_alert',

        'risk_alert',

        'show_weather',

'show_currency',

'show_news',

'show_trade',

'show_prediction',

    ];

}
<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(
            session('user_id')
        );

        $setting = Setting::firstOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'language' => 'en',
                'theme' => 'light',
                'sidebar' => 'expanded'
            ]
        );

        return view(
            'settings.index',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = Setting::where(
            'user_id',
            session('user_id')
        )->first();

        $setting->update([

    'language' => $request->language,

    'theme' => $request->theme,

    'sidebar' => $request->sidebar,

    'email_notification' => $request->has('email_notification'),

    'weather_alert' => $request->has('weather_alert'),

    'currency_alert' => $request->has('currency_alert'),

    'risk_alert' => $request->has('risk_alert'),

    'show_weather' => $request->has('show_weather'),

'show_currency' => $request->has('show_currency'),

'show_news' => $request->has('show_news'),

'show_trade' => $request->has('show_trade'),

'show_prediction' => $request->has('show_prediction'),
]);

        return back()->with(
            'success',
            'Settings updated.'
        );
    }

}
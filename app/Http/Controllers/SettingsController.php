<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class SettingsController extends Controller
{


    public function index()
    {

        $language = Session::get(
            'language',
            'en'
        );


        return view(
            'settings.index',
            compact('language')
        );

    }





    public function update(Request $request)
{

    $request->validate([
        'language'=>'required'
    ]);


    session([
        'language'=>$request->language
    ]);


    return redirect()
        ->back()
        ->with(
            'success',
            'Language changed'
        );

}


}
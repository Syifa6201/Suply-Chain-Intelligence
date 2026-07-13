<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;


class CurrencyController extends Controller
{


public function index(Request $request)
{


$countries = Country::orderBy('name')->get();



$selectedCountry = null;

$currencyData = null;



if($request->country){



$selectedCountry = Country::find($request->country);



if($selectedCountry){



$currencyData = [


'name'=>$selectedCountry->name,


'currency'=>$selectedCountry->currency ?? 'USD',


'rate'=>rand(1000,18000),


'status'=>

rand(0,1)

?

'Stable'

:

'Warning',



];



}



}





return view(
'currency.index',
compact(

'countries',

'selectedCountry',

'currencyData'

)

);



}



}
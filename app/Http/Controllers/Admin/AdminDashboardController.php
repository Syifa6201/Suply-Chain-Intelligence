<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Port;
use App\Models\Country;



class AdminDashboardController extends Controller
{


    public function index()
    {


        $totalUsers = User::count();


        $totalPorts = Port::count();


        $totalCountries = Country::count();



        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalPorts',
                'totalCountries'
            )
        );


    }


}
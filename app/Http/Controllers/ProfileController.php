<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function index()
    {

        $user = \App\Models\User::first();


        if(!$user){

            $user = (object)[

                'name'=>'Admin SupplyChain AI',

                'email'=>'admin@supplychain.ai',

                'role'=>'Administrator',

                'created_at'=>now()

            ];

        }


        return view(
            'profile.index',
            compact('user')
        );

    }





    public function update(Request $request)
    {


        $user = \App\Models\User::first();


        // jika belum login
        if(!$user){

            return back()->with(
                'error',
                'Profile demo. Silahkan aktifkan login terlebih dahulu.'
            );

        }



        $request->validate([

            'name'=>'required',

            'email'=>'required|email'

        ]);



        $user->update([
    'name'=>$request->name,
    'email'=>$request->email
]);



        return back()->with(

            'success',

            'Profile berhasil diperbarui'

        );


    }







    public function password(Request $request)
    {


        $user = Auth::user();


        if(!$user){

            return back()->with(

                'error',

                'User belum login'

            );

        }


        return back();


    }


}
<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class LoginController extends Controller
{


    public function index()
    {

        return view('auth.login');

    }



    public function login(Request $request)
    {


        $request->validate([

            'email'=>'required|email',

            'password'=>'required'

        ]);



        $user = User::where(
            'email',
            $request->email
        )->first();



        if(
            !$user ||
            !Hash::check(
                $request->password,
                $user->password
            )
        ){


            return back()->with(
                'error',
                'Email atau password salah.'
            );


        }



        session([

            'user_id'=>$user->id,

            'user_name'=>$user->name,

            'user_role'=>$user->role

        ]);




        if($user->role == 'admin')
        {

            return redirect('/admin');

        }



        return redirect('/dashboard');


    }




    public function logout()
    {


        session()->flush();



        return redirect('/login');


    }



}
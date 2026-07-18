<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        if (!session()->has('user_id')) {

            return redirect('/login');

        }

        $user = User::findOrFail(
            session('user_id')
        );

        return view(
            'profile.index',
            compact('user')
        );
    }



    public function update(Request $request)
    {

        if (!session()->has('user_id')) {

            return redirect('/login');

        }

        $request->validate([

            'name'  => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,'.session('user_id'),

        ]);

        $user = User::findOrFail(
            session('user_id')
        );

        $user->update([

            'name'  => $request->name,

            'email' => $request->email,

        ]);

        session([

            'user_name' => $user->name,

        ]);

        return back()->with(

            'success',

            'Profile berhasil diperbarui.'

        );
    }



    public function password(Request $request)
    {

        if (!session()->has('user_id')) {

            return redirect('/login');

        }

        $request->validate([

            'current_password' => 'required',

            'new_password'     => 'required|min:6|confirmed',

        ]);

        $user = User::findOrFail(
            session('user_id')
        );

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->with(

                'error',

                'Password lama salah.'

            );

        }

        $user->update([

            'password' => Hash::make($request->new_password),

        ]);

        return back()->with(

            'success',

            'Password berhasil diperbarui.'

        );
    }

}
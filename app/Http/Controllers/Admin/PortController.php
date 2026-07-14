<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Country;
use Illuminate\Http\Request;



class PortController extends Controller
{


    public function index()
    {

        $ports = Port::with('country')
            ->latest()
            ->get();


        return view(
            'admin.ports.index',
            compact('ports')
        );

    }





    public function create()
    {

        $countries = Country::orderBy('name')->get();


        return view(
            'admin.ports.create',
            compact('countries')
        );

    }





    public function store(Request $request)
    {


        $request->validate([


            'name'=>'required',

            'country_id'=>'required',

            'latitude'=>'required',

            'longitude'=>'required',

            'capacity'=>'required',

            'congestion'=>'required',

            'status'=>'required'


        ]);



        Port::create([


            'name'=>$request->name,


            'country_id'=>$request->country_id,


            'latitude'=>$request->latitude,


            'longitude'=>$request->longitude,


            'terminal'=>$request->terminal,


            'type'=>$request->type,


            'capacity'=>$request->capacity,


            'congestion'=>$request->congestion,


            'status'=>$request->status,


            'risk_score'=>$request->risk_score ?? 0


        ]);



        return redirect()
            ->route('ports.index')
            ->with(
                'success',
                'Port berhasil ditambahkan'
            );


    }





    public function edit(Port $port)
    {

        $countries = Country::orderBy('name')->get();


        return view(
            'admin.ports.edit',
            compact(
                'port',
                'countries'
            )
        );

    }





    public function update(
        Request $request,
        Port $port
    )
    {


        $request->validate([

            'name'=>'required',

            'country_id'=>'required',

            'latitude'=>'required',

            'longitude'=>'required'

        ]);



        $port->update([


            'name'=>$request->name,


            'country_id'=>$request->country_id,


            'latitude'=>$request->latitude,


            'longitude'=>$request->longitude,


            'terminal'=>$request->terminal,


            'type'=>$request->type,


            'capacity'=>$request->capacity,


            'congestion'=>$request->congestion,


            'status'=>$request->status,


            'risk_score'=>$request->risk_score ?? 0


        ]);



        return redirect()
            ->route('ports.index')
            ->with(
                'success',
                'Port berhasil diperbarui'
            );


    }





    public function destroy(Port $port)
    {


        $port->delete();



        return redirect()
            ->route('ports.index')
            ->with(
                'success',
                'Port berhasil dihapus'
            );


    }


}
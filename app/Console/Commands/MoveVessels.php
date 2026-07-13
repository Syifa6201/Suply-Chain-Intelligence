<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vessel;

class MoveVessels extends Command
{

    protected $signature = 'vessels:move';

    protected $description = 'Move vessel position based on speed and heading';


    public function handle()
    {


        $vessels = Vessel::where(
            'status',
            'Sailing'
        )->get();



        foreach($vessels as $vessel){



            /*
            |--------------------------------------------------------------------------
            | Skip stopped vessel
            |--------------------------------------------------------------------------
            */


            if($vessel->speed <= 0){

                continue;

            }




            /*
            |--------------------------------------------------------------------------
            | Convert heading to movement
            |--------------------------------------------------------------------------
            */


            $distance = $vessel->speed / 1000;



            $heading = deg2rad(
                $vessel->heading
            );



            $lat = $vessel->latitude;

            $lng = $vessel->longitude;



            $newLat = $lat + (
                cos($heading) * $distance
            );



            $newLng = $lng + (
                sin($heading) * $distance
            );





            $vessel->update([

                'latitude'=>$newLat,

                'longitude'=>$newLng

            ]);



        }



        $this->info(
            "Vessel positions updated"
        );


    }

}
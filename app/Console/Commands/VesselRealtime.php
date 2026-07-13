<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vessel;

class VesselRealtime extends Command
{

    protected $signature = 'vessels:realtime';

    protected $description = 'Realtime vessel movement';


    public function handle()
    {

        while(true)
        {

            $this->call('vessels:move');


            $this->info(
                now().' Vessel moved'
            );


            sleep(5);

        }

    }

}
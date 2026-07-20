<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class ShippingPortSeeder extends Seeder
{
    public function run(): void
{
    foreach (Country::all() as $country) {

        DB::table('shipping_ports')->updateOrInsert(

            [
                'country_id' => $country->id,
            ],

            [
                'port_name' => $country->name . ' Main Port',

                'city' => $country->capital ?? $country->name,

                'code' => strtoupper(substr($country->iso2 ?? 'XX',0,2)).'P',

                'latitude' => $country->latitude,

                'longitude' => $country->longitude,

                'capacity' => rand(500000,5000000),

                'status' => 'Operational',

                'international' => 1,

                'created_at' => now(),

                'updated_at' => now(),
            ]

        );

    }
}
}
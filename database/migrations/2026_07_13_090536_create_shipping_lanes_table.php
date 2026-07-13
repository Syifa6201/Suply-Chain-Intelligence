<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('shipping_lanes', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('region');

            $table->integer('risk_level')
                ->default(0);

            $table->integer('active_vessel')
                ->default(0);


            /*
            koordinat jalur
            disimpan JSON
            */

            $table->json('coordinates');


            $table->timestamps();

        });
    }



    public function down(): void
    {
        Schema::dropIfExists('shipping_lanes');
    }

};
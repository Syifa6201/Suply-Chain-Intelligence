<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('shipping_routes', function (Blueprint $table) {


            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Origin Port
            |--------------------------------------------------------------------------
            */

            $table->foreignId('origin_port_id')
                ->constrained('ports')
                ->cascadeOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Destination Port
            |--------------------------------------------------------------------------
            */

            $table->foreignId('destination_port_id')
                ->constrained('ports')
                ->cascadeOnDelete();



            $table->string('route_name')
                ->nullable();



            $table->integer('distance')
                ->nullable()
                ->comment('KM');



            $table->integer('estimated_days')
                ->nullable();



            $table->string('trade_type')
                ->nullable();



            $table->timestamps();


        });

    }


    public function down(): void
    {

        Schema::dropIfExists('shipping_routes');

    }

};
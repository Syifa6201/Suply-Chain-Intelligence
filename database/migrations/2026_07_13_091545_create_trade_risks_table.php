<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('trade_risks', function (Blueprint $table) {


            $table->id();


            /*
            Shipping Lane
            */

            $table->foreignId('shipping_lane_id')
                ->constrained()
                ->cascadeOnDelete();



            /*
            AI SCORE
            */

            $table->integer('risk_score')
                ->default(0);



            /*
            LEVEL

            LOW
            MEDIUM
            HIGH
            CRITICAL

            */

            $table->string('risk_level')
                ->default('LOW');



            /*
            Faktor Analisis
            */

            $table->integer('vessel_risk')
                ->default(0);


            $table->integer('port_risk')
                ->default(0);


            $table->integer('weather_risk')
                ->default(0);


            $table->integer('currency_risk')
                ->default(0);



            /*
            AI Explanation
            */

            $table->text('analysis')
                ->nullable();



            /*
            Recommendation Engine
            */

            $table->text('recommendation')
                ->nullable();



            $table->timestamps();


        });

    }



    public function down(): void
    {

        Schema::dropIfExists('trade_risks');

    }

};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vessels', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('imo')->unique();

            $table->string('name');

            $table->foreignId('country_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Position
            |--------------------------------------------------------------------------
            */

            $table->decimal('latitude',10,6);

            $table->decimal('longitude',10,6);

            /*
            |--------------------------------------------------------------------------
            | Destination
            |--------------------------------------------------------------------------
            */

            $table->string('destination');

            $table->string('current_port')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Vessel Status
            |--------------------------------------------------------------------------
            */

            $table->enum('status',[
                'Sailing',
                'Arrived',
                'Loading',
                'Delayed'
            ]);

            /*
            |--------------------------------------------------------------------------
            | Navigation
            |--------------------------------------------------------------------------
            */

            $table->integer('speed');

            $table->integer('heading')->default(0);

            /*
            |--------------------------------------------------------------------------
            | Cargo
            |--------------------------------------------------------------------------
            */

            $table->string('cargo');

            $table->bigInteger('capacity');

            /*
            |--------------------------------------------------------------------------
            | ETA
            |--------------------------------------------------------------------------
            */

            $table->dateTime('eta');

            /*
            |--------------------------------------------------------------------------
            | AI Risk
            |--------------------------------------------------------------------------
            */

            $table->integer('risk_score')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessels');
    }
};
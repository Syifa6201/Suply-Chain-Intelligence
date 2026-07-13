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
    Schema::create('ports', function (Blueprint $table) {

        $table->id();


        // Nama pelabuhan
        $table->string('name');


        // Relasi negara
        $table->foreignId('country_id')
              ->constrained()
              ->cascadeOnDelete();



        // Koordinat asli pelabuhan
        $table->decimal(
            'latitude',
            10,
            7
        );


        $table->decimal(
            'longitude',
            10,
            7
        );



        // Informasi logistik

        $table->string('terminal')
              ->nullable();


        $table->string('type')
              ->default('Container Port');



        // Kapasitas TEU per tahun

        $table->bigInteger('capacity')
              ->default(0);



        // tingkat kepadatan %

        $table->integer('congestion')
              ->default(0);



        // status operasi

        $table->enum(
            'status',
            [
                'Normal',
                'Delay',
                'Critical'
            ]
        )
        ->default('Normal');



        // AI risk score

        $table->integer('risk_score')
              ->default(0);



        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ports');
    }
};

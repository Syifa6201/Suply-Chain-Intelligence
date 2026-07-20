<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_ports', function (Blueprint $table) {

            $table->id();

            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnDelete();

            $table->string('port_name');

            $table->string('city');

            $table->string('code',10)->nullable();

            $table->decimal('latitude',10,7);

            $table->decimal('longitude',10,7);

            $table->integer('capacity')->default(100);

            $table->enum('status',[
                'Operational',
                'Busy',
                'Maintenance',
                'Closed'
            ])->default('Operational');

            $table->boolean('international')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_ports');
    }
};
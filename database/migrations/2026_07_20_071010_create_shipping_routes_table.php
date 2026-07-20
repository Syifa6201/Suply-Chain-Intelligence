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

            $table->foreignId('origin_port_id')
                ->constrained('shipping_ports')
                ->cascadeOnDelete();

            $table->foreignId('destination_port_id')
                ->constrained('shipping_ports')
                ->cascadeOnDelete();

            $table->double('distance_km');

            $table->integer('estimated_days');

            $table->decimal('base_cost',12,2);

            $table->enum('transport',[
                'sea',
                'air'
            ]);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_routes');
    }
};
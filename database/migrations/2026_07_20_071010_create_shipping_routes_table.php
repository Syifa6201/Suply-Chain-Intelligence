<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    
public function up(): void
{
    if (Schema::hasTable('shipping_routes')) {
        return;
    }

    Schema::create('shipping_routes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('origin_port_id');
        $table->unsignedBigInteger('destination_port_id');
        $table->double('distance_km');
        $table->integer('estimated_days');
        $table->decimal('base_cost', 12, 2);
        $table->enum('transport', ['sea', 'air']);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('shipping_routes');
    }
};
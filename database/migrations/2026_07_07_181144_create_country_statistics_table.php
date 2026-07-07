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
    Schema::create('country_statistics', function (Blueprint $table) {

        $table->id();

        $table->foreignId('country_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->decimal('inflation', 5, 2)->nullable();

        $table->bigInteger('population')->nullable();

        // dalam miliar USD
        $table->decimal('export_value', 15, 2)->nullable();

        $table->decimal('import_value', 15, 2)->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_statistics');
    }
};

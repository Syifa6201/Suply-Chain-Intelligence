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
        Schema::create('risk_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->float('weather_score')->default(0);
            $table->float('economic_score')->default(0);
            $table->float('currency_score')->default(0);
            $table->float('news_score')->default(0);
            $table->float('port_score')->default(0);
            $table->float('total_score')->default(0);
            $table->string('risk_level')->default('Low');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_scores');
    }
};

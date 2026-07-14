<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('country_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->double('weather_score')->default(0);

            $table->double('currency_score')->default(0);

            $table->double('economy_score')->default(0);

            $table->double('port_score')->default(0);

            $table->double('news_score')->default(0);

            $table->double('risk_score')->default(0);

            $table->double('recommendation_score')->default(0);

            $table->string('recommendation');

            $table->string('confidence')->nullable();

            $table->text('reason')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
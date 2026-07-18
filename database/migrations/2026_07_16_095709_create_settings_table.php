<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('language')->default('en');

            $table->string('theme')->default('light');

            $table->string('sidebar')->default('expanded');

            $table->boolean('email_notification')->default(true);

            $table->boolean('weather_alert')->default(true);

            $table->boolean('currency_alert')->default(true);

            $table->boolean('risk_alert')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
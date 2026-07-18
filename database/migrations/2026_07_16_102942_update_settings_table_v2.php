<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            // ==========================
            // UI
            // ==========================

            $table->string('color_theme')->default('blue');

            $table->string('font_size')->default('medium');


            // ==========================
            // Security
            // ==========================

            $table->boolean('two_factor')->default(false);


            // ==========================
            // Preference
            // ==========================

            $table->boolean('auto_refresh')->default(true);

            $table->integer('refresh_interval')->default(30);


            // ==========================
            // Map
            // ==========================

            $table->boolean('show_ports')->default(true);

            $table->boolean('show_vessels')->default(true);


            // ==========================
            // Artificial Intelligence
            // ==========================

            $table->boolean('ai_recommendation')->default(true);

            $table->boolean('ai_prediction')->default(true);

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([

                'color_theme',

                'font_size',

                'two_factor',

                'auto_refresh',

                'refresh_interval',

                'show_ports',

                'show_vessels',

                'ai_recommendation',

                'ai_prediction',

            ]);

        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->boolean('show_weather')->default(true);

            $table->boolean('show_currency')->default(true);

            $table->boolean('show_news')->default(true);

            $table->boolean('show_trade')->default(true);

            $table->boolean('show_prediction')->default(true);

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([

                'show_weather',

                'show_currency',

                'show_news',

                'show_trade',

                'show_prediction'

            ]);

        });
    }
};
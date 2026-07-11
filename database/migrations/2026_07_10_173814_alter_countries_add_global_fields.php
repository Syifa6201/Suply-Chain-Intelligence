<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->string('region')->nullable()->after('capital');

            $table->string('subregion')->nullable()->after('region');

            $table->string('currency')->nullable()->after('subregion');

            $table->string('currency_name')->nullable()->after('currency');

            $table->string('timezone')->nullable()->after('currency_name');

            $table->string('continent')->nullable()->after('timezone');

        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->dropColumn([

                'region',

                'subregion',

                'currency',

                'currency_name',

                'timezone',

                'continent'

            ]);

        });
    }
};
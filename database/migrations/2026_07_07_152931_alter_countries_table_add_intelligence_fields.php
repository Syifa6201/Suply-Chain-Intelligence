<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->string('iso2')->nullable()->after('code');
            $table->string('iso3')->nullable()->after('iso2');

            $table->string('capital')->nullable()->after('language');

            $table->decimal('latitude', 10, 6)->nullable()->after('capital');
            $table->decimal('longitude', 10, 6)->nullable()->after('latitude');

            $table->string('flag')->nullable()->after('longitude');

        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->dropColumn([
                'iso2',
                'iso3',
                'capital',
                'latitude',
                'longitude',
                'flag'
            ]);

        });
    }
};
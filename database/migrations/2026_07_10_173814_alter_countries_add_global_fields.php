<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            if (!Schema::hasColumn('countries', 'region')) {

                $table->string('region')
                    ->nullable()
                    ->after('capital');

            }

            if (!Schema::hasColumn('countries', 'subregion')) {

                $table->string('subregion')
                    ->nullable()
                    ->after('region');

            }

            if (!Schema::hasColumn('countries', 'currency')) {

                $table->string('currency')
                    ->nullable()
                    ->after('subregion');

            }

            if (!Schema::hasColumn('countries', 'currency_name')) {

                $table->string('currency_name')
                    ->nullable()
                    ->after('currency');

            }

            if (!Schema::hasColumn('countries', 'timezone')) {

                $table->string('timezone')
                    ->nullable()
                    ->after('currency_name');

            }

            if (!Schema::hasColumn('countries', 'continent')) {

                $table->string('continent')
                    ->nullable()
                    ->after('timezone');

            }

        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            if (Schema::hasColumn('countries', 'continent')) {
                $table->dropColumn('continent');
            }

            if (Schema::hasColumn('countries', 'timezone')) {
                $table->dropColumn('timezone');
            }

            if (Schema::hasColumn('countries', 'currency_name')) {
                $table->dropColumn('currency_name');
            }

            if (Schema::hasColumn('countries', 'subregion')) {
                $table->dropColumn('subregion');
            }

        });
    }
};
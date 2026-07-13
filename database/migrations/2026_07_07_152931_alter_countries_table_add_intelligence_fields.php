<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::table('countries', function (Blueprint $table) {


            if (!Schema::hasColumn('countries','code')) {

                $table->string('code')
                    ->nullable()
                    ->unique();

            }


            if (!Schema::hasColumn('countries','iso2')) {

                $table->string('iso2')
                    ->nullable();

            }


            if (!Schema::hasColumn('countries','iso3')) {

                $table->string('iso3')
                    ->nullable();

            }


            if (!Schema::hasColumn('countries','language')) {

                $table->string('language')
                    ->nullable();

            }


            if (!Schema::hasColumn('countries','capital')) {

                $table->string('capital')
                    ->nullable();

            }


            if (!Schema::hasColumn('countries','latitude')) {

                $table->decimal(
                    'latitude',
                    10,
                    6
                )
                ->nullable();

            }


            if (!Schema::hasColumn('countries','longitude')) {

                $table->decimal(
                    'longitude',
                    10,
                    6
                )
                ->nullable();

            }


            if (!Schema::hasColumn('countries','flag')) {

                $table->string('flag')
                    ->nullable();

            }


        });

    }



    public function down(): void
    {

        Schema::table('countries', function (Blueprint $table) {


            $columns = [

                'code',
                'iso2',
                'iso3',
                'language',
                'capital',
                'latitude',
                'longitude',
                'flag'

            ];


            foreach($columns as $column){


                if(Schema::hasColumn('countries',$column)){


                    $table->dropColumn($column);


                }


            }


        });

    }

};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {


        Schema::table('ports', function (Blueprint $table) {



            // Rename hanya jika port_name masih ada

            if(
                Schema::hasColumn('ports','port_name')
                &&
                !Schema::hasColumn('ports','name')
            ){

                $table->renameColumn(
                    'port_name',
                    'name'
                );

            }



            // Tambah city

            if(!Schema::hasColumn('ports','city')){

                $table->string('city')
                    ->nullable();

            }



            // Tambah congestion

            if(!Schema::hasColumn('ports','congestion')){

                $table->integer('congestion')
                    ->default(0);

            }



            // Tambah capacity

            if(!Schema::hasColumn('ports','capacity')){

                $table->integer('capacity')
                    ->nullable();

            }



        });


    }



    public function down(): void
    {


        Schema::table('ports', function (Blueprint $table) {



            if(Schema::hasColumn('ports','city')){

                $table->dropColumn('city');

            }



            if(Schema::hasColumn('ports','congestion')){

                $table->dropColumn('congestion');

            }



            if(Schema::hasColumn('ports','capacity')){

                $table->dropColumn('capacity');

            }



            if(
                Schema::hasColumn('ports','name')
                &&
                !Schema::hasColumn('ports','port_name')
            ){

                $table->renameColumn(
                    'name',
                    'port_name'
                );

            }



        });


    }

};
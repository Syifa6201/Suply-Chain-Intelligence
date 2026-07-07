<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ports', function (Blueprint $table) {

            // ubah port_name menjadi name
            $table->renameColumn('port_name', 'name');

            // kolom baru
            $table->string('city')->nullable()->after('name');

            $table->integer('congestion')->default(0)->after('status');

            $table->integer('capacity')->nullable()->after('congestion');

        });
    }

    public function down(): void
    {
        Schema::table('ports', function (Blueprint $table) {

            $table->renameColumn('name', 'port_name');

            $table->dropColumn([
                'city',
                'congestion',
                'capacity'
            ]);

        });
    }
};
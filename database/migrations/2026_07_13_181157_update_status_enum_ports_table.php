<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{

public function up(): void
{

DB::statement("
ALTER TABLE ports 
MODIFY status 
ENUM(
'Normal',
'Delay',
'Critical'
)
DEFAULT 'Normal'
");

}



public function down(): void
{

DB::statement("
ALTER TABLE ports 
MODIFY status 
ENUM(
'Normal',
'Delay'
)
DEFAULT 'Normal'
");

}


};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

public function up(): void
{

Schema::table('ports', function(Blueprint $table){



if(!Schema::hasColumn('ports','latitude')){

$table->decimal(
'latitude',
10,
7
)->nullable();

}



if(!Schema::hasColumn('ports','longitude')){

$table->decimal(
'longitude',
10,
7
)->nullable();

}



if(!Schema::hasColumn('ports','terminal')){

$table->string(
'terminal'
)
->nullable();

}



if(!Schema::hasColumn('ports','type')){

$table->string(
'type'
)
->default(
'Container Port'
);

}



if(!Schema::hasColumn('ports','risk_score')){

$table->integer(
'risk_score'
)
->default(0);

}



});


}


public function down(): void
{


Schema::table('ports',function(Blueprint $table){


$table->dropColumn([

'latitude',

'longitude',

'terminal',

'type',

'risk_score'

]);


});


}

};
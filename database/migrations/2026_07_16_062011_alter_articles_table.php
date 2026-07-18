<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->string('category')->after('title');

            $table->string('image')->nullable()->after('content');

            $table->enum('status', [
                'Draft',
                'Published'
            ])->default('Draft')->after('image');

            $table->foreignId('author_id')
                ->nullable()
                ->after('status')
                ->constrained('users')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->dropForeign(['author_id']);

            $table->dropColumn([
                'category',
                'image',
                'status',
                'author_id'
            ]);

        });
    }
};
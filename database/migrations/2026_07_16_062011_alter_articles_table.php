<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            if (!Schema::hasColumn('articles', 'category')) {
                $table->string('category')->after('title');
            }

            if (!Schema::hasColumn('articles', 'image')) {
                $table->string('image')->nullable()->after('content');
            }

            if (!Schema::hasColumn('articles', 'status')) {
                $table->enum('status', [
                    'Draft',
                    'Published'
                ])->default('Draft')->after('image');
            }

            if (!Schema::hasColumn('articles', 'author_id')) {
                $table->foreignId('author_id')
                    ->nullable()
                    ->after('status')
                    ->constrained('users')
                    ->nullOnDelete();
            }

        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            if (Schema::hasColumn('articles', 'author_id')) {
                $table->dropForeign(['author_id']);
            }

            $columns = [];

            if (Schema::hasColumn('articles', 'category')) {
                $columns[] = 'category';
            }

            if (Schema::hasColumn('articles', 'image')) {
                $columns[] = 'image';
            }

            if (Schema::hasColumn('articles', 'status')) {
                $columns[] = 'status';
            }

            if (Schema::hasColumn('articles', 'author_id')) {
                $columns[] = 'author_id';
            }

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }

        });
    }
};
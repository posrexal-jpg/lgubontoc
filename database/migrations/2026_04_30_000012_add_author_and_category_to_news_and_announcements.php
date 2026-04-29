<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('newsand_updates_news', function (Blueprint $table) {
            $table->string('author')->nullable()->after('title');
            $table->string('category')->nullable()->after('author');
        });

        Schema::table('newsand_updates_upcomingupdates', function (Blueprint $table) {
            $table->string('author')->nullable()->after('title');
            $table->string('category')->nullable()->after('author');
        });
    }

    public function down(): void
    {
        Schema::table('newsand_updates_news', function (Blueprint $table) {
            $table->dropColumn(['author', 'category']);
        });

        Schema::table('newsand_updates_upcomingupdates', function (Blueprint $table) {
            $table->dropColumn(['author', 'category']);
        });
    }
};

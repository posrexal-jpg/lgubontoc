<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('others_downloadableforms', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('description');
            $table->string('file_name')->nullable()->after('file_path');
            $table->unsignedInteger('sort_order')->default(0)->after('file_name');
            $table->boolean('is_published')->default(true)->after('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('others_downloadableforms', function (Blueprint $table) {
            $table->dropColumn(['file_path', 'file_name', 'sort_order', 'is_published']);
        });
    }
};

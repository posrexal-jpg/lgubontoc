<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['transparency_municipalordinances', 'transparency_resolutions'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (! Schema::hasColumn($tableName, 'document_number')) {
                    $table->string('document_number')->nullable()->after('title');
                }

                if (! Schema::hasColumn($tableName, 'approved_date')) {
                    $table->date('approved_date')->nullable()->after('description');
                }

                if (! Schema::hasColumn($tableName, 'year')) {
                    $table->unsignedSmallInteger('year')->nullable()->after('approved_date');
                }

                if (! Schema::hasColumn($tableName, 'status')) {
                    $table->string('status')->nullable()->default('Approved')->after('year');
                }

                if (! Schema::hasColumn($tableName, 'file_path')) {
                    $table->string('file_path')->nullable()->after('status');
                }

                if (! Schema::hasColumn($tableName, 'file_name')) {
                    $table->string('file_name')->nullable()->after('file_path');
                }

                if (! Schema::hasColumn($tableName, 'sort_order')) {
                    $table->unsignedInteger('sort_order')->default(0)->after('file_name');
                }

                if (! Schema::hasColumn($tableName, 'is_published')) {
                    $table->boolean('is_published')->default(true)->after('sort_order');
                }
            });

            DB::table($tableName)
                ->whereNull('year')
                ->update(['year' => DB::raw('YEAR(created_at)')]);
        }
    }

    public function down(): void
    {
        foreach (['transparency_municipalordinances', 'transparency_resolutions'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                foreach (['document_number', 'approved_date', 'year', 'status', 'file_path', 'file_name', 'sort_order', 'is_published'] as $column) {
                    if (Schema::hasColumn($tableName, $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};

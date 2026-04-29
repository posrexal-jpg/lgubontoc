<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('newsand_updates_upcomingupdates', function (Blueprint $table) {
            $table->date('date_posted')->format('m/d/Y')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsand_updates_upcomingupdates', function (Blueprint $table) {
            //
        });
    }
};

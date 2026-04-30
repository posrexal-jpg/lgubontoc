<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aboutus_missionandvisions', function (Blueprint $table) {
            if (! Schema::hasColumn('aboutus_missionandvisions', 'mission')) {
                $table->text('mission')->nullable()->after('description');
            }

            if (! Schema::hasColumn('aboutus_missionandvisions', 'vision')) {
                $table->text('vision')->nullable()->after('mission');
            }
        });

        DB::table('aboutus_missionandvisions')
            ->whereNull('mission')
            ->update(['mission' => DB::raw('description')]);

        DB::table('aboutus_missionandvisions')
            ->whereNull('vision')
            ->update(['vision' => DB::raw('description')]);
    }

    public function down(): void
    {
        Schema::table('aboutus_missionandvisions', function (Blueprint $table) {
            if (Schema::hasColumn('aboutus_missionandvisions', 'vision')) {
                $table->dropColumn('vision');
            }

            if (Schema::hasColumn('aboutus_missionandvisions', 'mission')) {
                $table->dropColumn('mission');
            }
        });
    }
};

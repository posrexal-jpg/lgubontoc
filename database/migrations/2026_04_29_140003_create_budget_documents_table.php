<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budget_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('year');
            $table->string('category'); // annual-budget, financial-report, disbursement, procurement
            $table->string('file_path')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_documents');
    }
};

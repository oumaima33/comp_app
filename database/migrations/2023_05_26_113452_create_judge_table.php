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
        Schema::create('judge', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('categorie');
            $table->unsignedBigInteger('competition_id')->references('id')->on('competitions');
            $table->integer('comp_code')->references('code')->on('competitions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judge');
    }
};

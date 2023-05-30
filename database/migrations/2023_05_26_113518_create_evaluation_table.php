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
        Schema::create('evaluation', function (Blueprint $table) {
            $table->id();
            $table->integer('note1');
            $table->integer('note2');
            $table->integer('note3');
            $table->integer('note4');
            $table->integer('note5');
            $table->unsignedBiginteger('fk_par');
            $table->foreign('fk_par')->references('id')->on('participant')->constrainted();
            $table->unsignedBiginteger('fk_jd');
            $table->foreign('fk_jd')->references('id')->on('judge')->constrainted();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation');
    }
};

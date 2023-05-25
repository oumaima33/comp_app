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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('comp_name');
            $table->integer('part_nbr');
            $table->text('description');
            $table->text('categorie');
            $table->text('criteria_1');
            $table->text('criteria_2');
            $table->text('criteria_3');
            $table->text('criteria_4');
            $table->text('criteria_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};

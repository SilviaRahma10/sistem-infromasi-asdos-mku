<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah_prodis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mata_kuliah')->constrained('mata_kuliahs')->cascadeOnDelete();
            $table->foreignId('id_prodi')->constrained('prodis')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah_prodis');
    }
};

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
        Schema::create('mku_programs', function (Blueprint $table) {
            $table->id();
            //id_program, id_mata_kuliah, syarat, kualifikasi
            $table->foreignId('id_program')->constrained('programs')->cascadeOnDelete();
            $table->foreignId('id_mata_kuliah')->constrained('mata_kuliahs')->cascadeOnDelete();
            $table->integer('kuota');
            $table->mediumText('syarat')->nullable();
            $table->mediumText('kualifikasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mku_programs');
    }
};

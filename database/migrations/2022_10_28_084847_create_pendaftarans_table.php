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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            //id_mahasiswa, id_program, id_mku, status
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->cascadeOnDelete();
            $table->foreignId('id_program')->constrained('programs')->cascadeOnDelete();
            $table->foreignId('id_mata_kuliah')->constrained('mata_kuliahs')->cascadeOnDelete();
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
};

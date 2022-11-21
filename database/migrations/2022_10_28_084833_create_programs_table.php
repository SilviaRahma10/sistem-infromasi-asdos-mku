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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            //id_tahun_ajaran, tanggal_buka, tanggal_tutup, kuota, is_active
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajarans')->cascadeOnDelete();
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            // $table->integer('kuota');
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('programs');
    }
};

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
        Schema::create('document_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_registration')->constrained('registrations')->cascadeOnDelete();
            $table->string('krs');
            $table->string('khs');
            $table->string('surat_rekomendasi');
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
        Schema::dropIfExists('document_registrations');
    }
};

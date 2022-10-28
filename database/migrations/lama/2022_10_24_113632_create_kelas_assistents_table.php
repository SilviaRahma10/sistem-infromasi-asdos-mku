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
        Schema::create('kelas_assistents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_schoolyear')->constrained('school_years')->cascadeOnDelete();
            $table->foreignId('id_generalsubject')->constrained('general_subjects')->cascadeOnDelete();
            $table->foreignId('id_student')->constrained('students')->cascadeOnDelete();
            $table->foreignId('id_kelas')->constrained('kelas')->cascadeOnDelete();
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
        Schema::dropIfExists('kelas_assistents');
    }
};

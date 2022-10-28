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
            $table->foreignId('id_generalsubject')->constrained('general_subjects')->onDelete('cascade');
            $table->foreignId('id_schoolyear')->constrained('school_years')->onDelete('cascade');
            $table->date('start_period');
            $table->date('finish_period');
            $table->integer('quota');
            $table->text('qualification');
            $table->text('terms_and_conditions');
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

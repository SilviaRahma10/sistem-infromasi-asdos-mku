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
        Schema::create('general_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique;
            // $table->date('start_period');
            // $table->date('finish_period');
            // $table->integer('quota');
            // $table->text('qualification');
            // $table->text('terms_and_conditions');
            // $table->json('prodi');
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
        Schema::dropIfExists('general_subjects');
    }
};

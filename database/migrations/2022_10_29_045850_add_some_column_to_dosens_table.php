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
        Schema::table('dosens', function (Blueprint $table) {
            $table->string('nidn')->after('nip')->nullable();
            $table->string('no_hp')->after('nidn')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->after('nidn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosens', function (Blueprint $table) {
            //
        });
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('karyawan_no')->unsigned();
            $table->foreign('karyawan_no')->references('no')->on('karyawan')->onDelete('no action')->onUpdate('cascade');
            $table->string('hari_tanggal');
            $table->time('jam_datang');
            $table->time('jam_pulang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
}

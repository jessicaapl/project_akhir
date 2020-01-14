<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_jadwal');
            $table->foreign('id_jadwal')
                ->references('id')
                ->on('jadwal')
                ->onDelete('cascade');
            $table->string('kelas_siswa',10);
            $table->string('alasan',225);
            $table->date('tanggal');
            $table->string('keterangan',5);
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
        Schema::table('izin', function (Blueprint $table) {
            $table->dropForeign(['id_jadwal']);
        });
        Schema::dropIfExists('izin');
    }
}

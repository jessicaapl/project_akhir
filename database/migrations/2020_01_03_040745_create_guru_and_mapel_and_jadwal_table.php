<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruAndMapelAndJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',225);
            $table->timestamps();
        });
        Schema::create('mapel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',225);
            $table->timestamps();
        });
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hari',225);
            $table->bigInteger('mapel_id');
            $table->foreign('mapel_id')
                ->references('id')
                ->on('mapel')
                ->onDelete('cascade');
             $table->bigInteger('guru_id');
             $table->foreign('guru_id')
                 ->references('id')
                 ->on('guru')
                 ->onDelete('cascade');
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
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);
            $table->dropForeign(['guru_id']);
        });
        Schema::dropIfExists('guru');
        Schema::dropIfExists('mapel');
        Schema::dropIfExists('jadwal');
    }
}
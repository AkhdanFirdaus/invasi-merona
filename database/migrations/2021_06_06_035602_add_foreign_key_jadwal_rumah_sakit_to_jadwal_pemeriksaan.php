<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyJadwalRumahSakitToJadwalPemeriksaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_pemeriksaans', function (Blueprint $table) {
            $table->foreign('jadwal_rumah_sakit_id', 'FK_jadwal_pemeriksaans_jadwal_rumah_sakit_id')->references('id')->on('jadwal_rumah_sakits')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_pemeriksaans', function (Blueprint $table) {
            $table->dropForeign('FK_jadwal_pemeriksaans_jadwal_rumah_sakit_id');
        });
    }
}

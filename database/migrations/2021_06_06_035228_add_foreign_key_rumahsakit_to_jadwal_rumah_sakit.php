<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRumahsakitToJadwalRumahSakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_rumah_sakits', function (Blueprint $table) {
            $table->foreign('rumah_sakit_id', 'FK_jadwal_rumah_sakits_rumah_sakit_id')->references('id')->on('rumah_sakits')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_rumah_sakits', function (Blueprint $table) {
            $table->dropForeign('fk_jadwal_rumah_sakits_rumah_sakit_id');
        });
    }
}

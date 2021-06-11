<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPendaftarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->foreign('user_id', 'FK_pendaftarans_user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('jadwal_pemeriksaan_id', 'FK_pendaftarans_jadwal_pemeriksaan_id')->references('id')->on('jadwal_pemeriksaans')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('vaksin_id', 'FK_pendaftarans_vaksin_id')->references('id')->on('vaksins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropForeign('FK_pendaftarans_user_id');
            $table->dropForeign('FK_pendaftarans_jadwal_pemeriksaan_id');
            $table->dropForeign('FK_pendaftarans_vaksin_id');
        });
    }
}

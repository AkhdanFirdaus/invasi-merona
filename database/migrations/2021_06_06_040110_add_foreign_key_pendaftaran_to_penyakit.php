<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPendaftaranToPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyakits', function (Blueprint $table) {
            $table->foreign('pendaftaran_id', 'FK_penyakits_pendaftaran_id')->references('id')->on('pendaftarans')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyakits', function (Blueprint $table) {
            $table->dropForeign('FK_penyakits_pendaftaran_id');
        });
    }
}

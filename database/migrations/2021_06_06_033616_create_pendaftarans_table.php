<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('jadwal_pemeriksaan_id');
            $table->foreignId('vaksin_id');
            $table->string('name');
            $table->string('nik');
            $table->string('email')->unique()->nullable();
            $table->unsignedSmallInteger('gender')->comment("0:Woman; 1:Man");
            $table->string('no_telp')->nullable();
            $table->text('address');
            $table->date('birth_date');
            $table->unsignedSmallInteger('status')->comment("0:Pending; 1:Approve, 2:Denied");
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
        Schema::dropIfExists('pendaftarans');
    }
}

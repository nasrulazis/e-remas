<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infaq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pengirim')->nullable;
            $table->integer('id_masjid');
            $table->integer('infaq');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('infaqs');
    }
}

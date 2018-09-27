<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('iklan_id')->unsigned();
            $table->integer('jumlah');
            $table->boolean('pesanan');//status sudah masuk daftar pesan atau belum
            $table->boolean('status');//0 belum di bayar & 1 sudah di bayar
            $table->boolean('isReceived');//sudah terkirim atau blm
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('iklan_id')->references('id')->on('iklan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belanja');
    }
}

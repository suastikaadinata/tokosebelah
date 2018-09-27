<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('pembayaran_id')->unsigned()->nullable();
            $table->string('nama');//atas nama siapa
            $table->string('alamat_pengiriman');
            $table->string('nomor_telepon');
            $table->integer('provinsi_id')->unsigned();
            $table->integer('kabupaten_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}

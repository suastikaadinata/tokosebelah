<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIklanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->decimal('harga', 13, 2);
            $table->boolean('isVerified');
            $table->string('status');//laku atau tidak
            $table->string('nomor_telepon');//laku atau tidak
            $table->string('alamat');
            $table->integer('provinsi_id')->unsigned();
            $table->integer('kabupaten_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('iklan');
    }
}

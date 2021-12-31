<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategory', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategory', 255);
            $table->timestamps();
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 255);
            $table->float('harga_barang');
            $table->string('ukuran_barang', 255);
            $table->string('upgambar', 255);
            $table->unsignedBigInteger('kategory_id');
            $table->timestamps();

            $table->foreign('kategory_id')->references('id')->on('kategory')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_barang');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategory');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('transaksi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangTable extends Migration
{
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->string('id_barang')->primary(); // ID Barang sebagai primary key
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
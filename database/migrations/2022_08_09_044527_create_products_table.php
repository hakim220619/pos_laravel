<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('nama_barang');
            $table->string('gambar');
            $table->string('kategori');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('profit');
            $table->integer('stok');
            $table->string('satuan');
            $table->integer('id_cabang');
            $table->text('keterangan');
            $table->integer('id_suplier');
            $table->string('kode_penjualan');
            $table->string('kode_pembelian');
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
        Schema::dropIfExists('products');
    }
};

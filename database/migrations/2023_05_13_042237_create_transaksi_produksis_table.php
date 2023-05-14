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
        Schema::create('transaksi_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('npk', 5);
            $table->foreign('npk')->references('npk')->on('master_karyawan');
            $table->datetime('tanggal_transaksi');
            $table->string('lokasi', 4);
            $table->foreign('lokasi')->references('kode')->on('master_lokasi');
            $table->string('kode', 4);
            $table->foreign('kode')->references('kode')->on('master_planning');
            $table->integer('qty_actual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_produksi');
    }
};

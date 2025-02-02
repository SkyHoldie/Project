<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang'); // Primary Key
            $table->string('kode_barang', 20)->unique(); // Kolom kode barang yang unik
            $table->string('nama_barang', 100); // Kolom nama barang
            $table->string('spesifikasi_teknis', 100); // Kolom spesifikasi teknis
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        // Schema::table('tbl_master_barang', function (Blueprint $table) {
        //     $table->index(['kode_barang'], 'kode_barang_index'); // Indeks pada kolom 'kode_barang'
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_master_barang');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lokasi', function (Blueprint $table) {
            $table->bigIncrements('id_lokasi')->primary(); // Primary Key
            $table->string('kode_lokasi', 20)->unique(); // Kolom kode lokasi yang unik
            $table->string('nama_lokasi', 250); // Kolom nama lokasi
            $table->string('keterangan', 50)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        
        // Tambahkan indeks
        Schema::table('tbl_lokasi', function (Blueprint $table) {
            $table->index(['kode_lokasi', 'nama_lokasi'], 'lokasi_index'); // Indeks pada kolom 'kode_lokasi' dan 'nama_lokasi'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_lokasi');
    }
}

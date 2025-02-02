<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMutasiLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->bigIncrements('id_mutasi_lokasi'); // Primary Key
            $table->unsignedBigInteger('id_lokasi'); // Foreign Key ke tbl_lokasi
            $table->unsignedBigInteger('id_pengadaan'); // Foreign Key ke tbl_pengadaan
            $table->string('flag_lokasi', 45); // Kolom flag lokasi
            $table->string('flag_pindah', 45); // Kolom flag pindah
            $table->timestamps(); // Kolom created_at dan updated_at




            $table->foreign('id_lokasi')
                ->references('id_lokasi')
                ->on('tbl_lokasi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_pengadaan')
                ->references('id_pengadaan')
                ->on('tbl_pengadaan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });



        // Menambahkan relasi dengan tabel lainnya


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
}

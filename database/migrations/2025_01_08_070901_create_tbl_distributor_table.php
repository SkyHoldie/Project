<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDistributorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_distributor', function (Blueprint $table) {
            $table->bigIncrements('id_distributor'); // Primary Key
            $table->string('nama_distributor', 50); // Kolom nama distributor
            $table->string('alamat', 50); // Kolom alamat
            $table->string('no_telp', 15)->nullable(); // Kolom nomor telepon yang diizinkan NULL
            $table->string('email', 30)->nullable(); // Kolom email
            $table->string('keterangan', 45)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan indeks
        Schema::table('tbl_distributor', function (Blueprint $table) {
            $table->index(['nama_distributor', 'no_telp'], 'distributor_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_distributor');
    }
}

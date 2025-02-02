<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMerkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_merk', function (Blueprint $table) {
            $table->bigIncrements('id_merk'); // Primary Key
            $table->string('merk', 50); // Kolom merk
            $table->string('keterangan', 500)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tambahkan index
        Schema::table('tbl_merk', function (Blueprint $table) {
            $table->index(['merk'], 'merk_index'); // Index pada kolom 'merk'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_merk');
    }
}

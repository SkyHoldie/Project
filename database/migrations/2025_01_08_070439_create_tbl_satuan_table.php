<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSatuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tbl_satuan')) {
            return;
        }
        Schema::create('tbl_satuan', function (Blueprint $table) {
            $table->bigIncrements('id_satuan');
            $table->string('nama_satuan');
            $table->timestamps();
        });

        // Tambahkan indeks
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_satuan');
    }
}

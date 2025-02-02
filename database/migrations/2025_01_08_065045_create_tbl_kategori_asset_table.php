<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('tbl_kategori_asset')) {
            return;
        }
        Schema::create('tbl_kategori_asset', function (Blueprint $table) {
            $table->bigIncrements('id_kategori_asset'); // id_kategori_asset INT
            $table->string('kode_kategori_asset', 20)->unique(); // kode_kategori_asset VARCHAR(20)
            $table->string('kategori_asset', 25); // kategori_asset VARCHAR(25)
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_kategori_asset');
    }
};

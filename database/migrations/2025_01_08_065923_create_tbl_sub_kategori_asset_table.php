<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubKategoriAssetTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // if (Schema::hasTable('tbl_sub_kategori_asset')) {
        //     return;
        // }
        
        // Create tbl_sub_kategori_asset table
        Schema::create('tbl_sub_kategori_asset', function (Blueprint $table) {
            // Set InnoDB engine for foreign key support
            $table->engine = 'InnoDB';

            // Define columns
             $table->bigIncrements('id_sub_kategori_asset');  // Column id_sub_kategori_asset
            $table->string('kode_sub_kategori_asset');  // Column kode_sub_kategori_asset
            $table->string('nama_sub_kategori');  // Column nama_sub_kategori
            $table->unsignedBigInteger('id_kategori_asset');  // Column kategori_id which will be foreign key
            $table->timestamps();  // Created_at and updated_at columns

            // Add foreign key constraint on kategori_id
            $table->foreign('id_kategori_asset')
                ->references('id_kategori_asset')  // Points to id_kategori_asset column in tbl_kategori_asset
                ->on('tbl_kategori_asset');  // Deletes sub-category if the category is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel tbl_sub_kategori_asset
        Schema::dropIfExists('tbl_sub_kategori_asset');
    }
}

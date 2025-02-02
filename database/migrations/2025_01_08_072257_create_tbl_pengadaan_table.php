<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_pengadaan'); // Primary Key
            $table->unsignedBigInteger('id_master_barang'); // Foreign Key ke tbl_master_barang
            $table->unsignedBigInteger('id_depresiasi'); // Foreign Key ke tbl_depresiasi
            $table->unsignedBigInteger('id_merk'); // Foreign Key ke tbl_merk
            $table->unsignedBigInteger('id_satuan'); // Foreign Key ke tbl_satuan
            $table->unsignedBigInteger('id_sub_kategori_asset'); // Foreign Key ke tbl_sub_kategori_asset
            $table->unsignedBigInteger('id_distributor'); // Foreign Key ke tbl_distributor
            $table->string('kode_pengadaan', 20); // Kolom kode pengadaan
            $table->string('no_invoice', 20); // Kolom nomor invoice
            $table->string('no_seri_barang', 50); // Kolom nomor seri barang
            $table->string('tahun_produksi', 5); // Kolom tahun produksi
            $table->date('tgl_pengadaan'); // Kolom tanggal pengadaan
            $table->decimal('harga_barang'); // Kolom harga barang
            $table->decimal('nilai_barang'); // Kolom nilai barang
            $table->decimal('depresiasi_barang')->default(0);
            $table->enum('fb', ['0', '1']); // Kolom flag (fb) dengan nilai enum
            $table->string('keterangan', 50)->nullable(); // Kolom keterangan
            $table->timestamps(); // Kolom created_at dan updated_at


            // // Adding foreign key constraints

            // Ensure the foreign keys reference columns with matching types and primary/unique constraints
            $table->foreign('id_master_barang')
                ->references('id_barang')
                ->on('tbl_master_barang')
                ->onDelete('cascade');

            $table->foreign('id_depresiasi')
                ->references('id_depresiasi')
                ->on('tbl_depresiasi')
                ->onDelete('cascade');

            $table->foreign('id_merk')
                ->references('id_merk')
                ->on('tbl_merk')
                ->onDelete('cascade');

            $table->foreign('id_satuan')
                ->references('id_satuan')
                ->on('tbl_satuan')
                ->onDelete('cascade');

            $table->foreign('id_sub_kategori_asset')
                ->references('id_sub_kategori_asset')
                ->on('tbl_sub_kategori_asset')
                ->onDelete('cascade');

            $table->foreign('id_distributor')
                ->references('id_distributor')
                ->on('tbl_distributor')
                ->onDelete('cascade');

        });

        // Add indexes
     

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pengadaan');
    }
}


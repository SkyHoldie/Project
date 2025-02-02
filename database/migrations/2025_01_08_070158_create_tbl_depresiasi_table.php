<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepresiasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tbl_depresiasi')) {
            return;
        }
        Schema::create('tbl_depresiasi', function (Blueprint $table) {
            $table->bigIncrements('id_depresiasi');  // Make sure this column is a primary key or unique
            $table->integer('lama_depresiasi');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_depresiasi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->string("nama_karyawan");                        
            $table->string("divisi");
            $table->string("keperluan");
            $table->integer("total_harga");
            $table->date('tanggal_permintaan');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('pengeluaran');
    }
}

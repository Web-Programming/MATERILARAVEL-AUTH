<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id(); //PK, auto increment
            //nama, kode, email, tanggal berdiri, alamat
            $table->string("nama", 50);
            $table->string("kode", 4);
            $table->string("email", 255);
            $table->date("tgl_berdiri");
            $table->text("alamat");
            $table->timestamps(); //tanggal buat (created_at), tgl update (updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fakultas');
    }
}

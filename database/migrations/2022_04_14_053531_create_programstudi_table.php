<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramstudiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programstudi', function (Blueprint $table) {
            $table->id();
            $table->string("kode_prodi", 4);
            $table->string("nama_prodi", 50);
            $table->unsignedBigInteger("id_fakultas");
            $table->foreign("id_fakultas")->references("id")->on("fakultas");
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
        Schema::dropIfExists('programstudi');
    }
}

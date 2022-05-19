<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodeposKotaFakultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("fakultas", function (Blueprint $table) {
            $table->string("kodepos", 6)->nullable()->after("alamat");
            $table->string("kota", 150)->nullable()->after("kodepos");   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("fakultas", function (Blueprint $table) {
            $table->dropColumn("kodepos");
            $table->dropColumn("kota");
        });
    }
}

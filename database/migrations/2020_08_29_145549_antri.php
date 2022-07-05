<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Antri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_id')->unsigned();
            $table->foreign('fk_id')->references('id')->on('data')->onDelete('cascade');
            $table->string('random');
            $table->string('qrcode');
            $table->string('nomor_antri')->default(0);
            $table->string('antri_jalan');
            $table->string('idB');
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
        //
    }
}

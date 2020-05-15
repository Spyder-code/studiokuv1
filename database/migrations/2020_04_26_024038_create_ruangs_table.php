<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_studio');
            $table->string('nama');
            $table->string('kategori');
            $table->string('harga');
            $table->string('fasilitas');
            $table->integer('status');
            $table->string('image');
            $table->timestamps();

            $table->foreign('id_studio')
            ->references('id')
            ->on('studios')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangs');
    }
}

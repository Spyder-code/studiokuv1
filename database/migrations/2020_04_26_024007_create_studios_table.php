<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_mitra');
            $table->string('name');
            $table->string('address');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('phone');
            $table->string('open');
            $table->string('closed');
            $table->string('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('id_mitra')->references('id')->on('mitras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten_xa');
            

            //foreign key
            $table->unsignedBigInteger('id_huyen');
            $table->foreign('id_huyen')->references('id')->on('huyen');
            $table->unsignedBigInteger('id_tinh');
            $table->foreign('id_tinh')->references('id')->on('tinh');

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
        Schema::dropIfExists('xa');
    }
}

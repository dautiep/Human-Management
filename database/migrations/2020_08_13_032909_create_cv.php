<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten', 255);
            $table->string('email', 255);
            $table->string('so_dien_thoai', 255);
            $table->string('ten_cv', 255);

            //foreign key
            $table->unsignedBigInteger('id_job');
            $table->foreign('id_job')->references('id')->on('job');
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
        Schema::dropIfExists('cv');
    }
}

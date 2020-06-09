<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ma_job', 255);
            $table->string('ten_job', 255);
            $table->string('capbac_vitri', 255);
            $table->text('li_do_tuyen');
            $table->integer('so_luong_tuyen');
            $table->integer('songay_tieuchuan_vitri');
            $table->date('thoigian_offer');
            $table->date('thoigian_den_onboard');
            

            //foreign key
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_duan');
            $table->foreign('id_duan')->references('id')->on('duan');

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
        Schema::dropIfExists('job');
    }
}

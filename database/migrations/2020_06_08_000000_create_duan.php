<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten_du_an', 255);
            $table->string('slug', 255);
            $table->integer('quymo_tbinh');
            $table->date('thoigian_batdau');
            $table->date('thoigian_ketthuc');
            $table->text('mota_duan');
            $table->timestamps();

            //foreign key
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duan');
    }
}

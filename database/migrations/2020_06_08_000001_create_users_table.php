<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('avatar');
            $table->string('hoten');
            $table->tinyInteger('gioi_tinh');
            $table->string('so_dien_thoai', 20);
            $table->string('danhso');
            $table->rememberToken();
           

            //foreign key
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
        Schema::dropIfExists('users');
    }
}

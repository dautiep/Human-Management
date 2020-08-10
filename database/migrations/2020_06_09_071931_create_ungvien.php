<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUngvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ungvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ma_ungvien', 255)->nullable();
            $table->string('ho_ten', 255);
            $table->tinyInteger('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('so_dien_thoai', 20);
            $table->string('email', 255);
            $table->string('sonha', 255);
            

            //foreign key
            $table->unsignedBigInteger('id_xa');
            $table->foreign('id_xa')->references('id')->on('xa');
            $table->unsignedBigInteger('id_huyen');
            $table->foreign('id_huyen')->references('id')->on('huyen');
            $table->unsignedBigInteger('id_tinh');
            $table->foreign('id_tinh')->references('id')->on('tinh');
            $table->unsignedBigInteger('id_nguonjob');
            $table->foreign('id_nguonjob')->references('id')->on('nguonjob');
            $table->unsignedBigInteger('id_job');
            $table->foreign('id_job')->references('id')->on('job');
            $table->unsignedBigInteger('id_chucdanh');
            $table->foreign('id_chucdanh')->references('id')->on('chucdanh');
            $table->unsignedBigInteger('id_trinhdovanhoa');
            $table->foreign('id_trinhdovanhoa')->references('id')->on('trinhdovanhoa');
            $table->unsignedBigInteger('id_trangthai_phongvan');
            $table->foreign('id_trangthai_phongvan')->references('id')->on('trangthaiphongvan');
            $table->unsignedBigInteger('id_ketqua_phongvan');
            $table->foreign('id_ketqua_phongvan')->references('id')->on('ketquaphongvan');

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
        Schema::dropIfExists('ungvien');
    }
}

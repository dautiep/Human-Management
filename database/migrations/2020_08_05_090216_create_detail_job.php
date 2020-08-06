<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_job', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chitiet', 255);
            $table->text('mo_ta_cong_viec');
            $table->text('quyen_loi');
            $table->text('yeu_cau_cong_viec');
            $table->text('thoi_gian_lam_viec');

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
        Schema::dropIfExists('detail_job');
    }
}

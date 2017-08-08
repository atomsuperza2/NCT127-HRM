<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('accountinfo')->onDelete('cascade');
            $table->integer('cutoff_id')->nullable();
            $table->double('hourswork')->nullable(); // ชั่วโมงงานทั้งหมด
            $table->double('hwpay')->nullable();
            $table->double('latetime')->nullable(); // เข้างานสาย
            $table->double('ltpay')->nullable(); // เข้าสายรวมเป็นเงิน
            $table->double('overtime')->nullable(); //OT(งานนอกเวลา)
            $table->double('otpay')->nullable(); //เงินนอกเวลา
            $table->double('totalpay')->nullable(); //จำนวนเงินคงเหลือ
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
        Schema::dropIfExists('pay');
    }
}

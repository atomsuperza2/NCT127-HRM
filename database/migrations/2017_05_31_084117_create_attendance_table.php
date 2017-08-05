<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('accountinfo')->onDelete('cascade');
            $table->integer('cutoff_id')->nullable();
            $table->date('date')->nullable();
            $table->time('timeIn')->nullable();
            $table->time('timeOut')->nullable();
            $table->time('hoursWorked')->nullable();
            $table->double('totalH')->nullable();
            $table->time('tardiness')->nullable();
            $table->double('totalL')->nullable();
            $table->time('overtime')->nullable();
            $table->double('totalOT')->nullable();
            $table->double('price')->nullable();
            $table->double('totalP')->nullable();
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
        Schema::dropIfExists('attendance');
    }
}

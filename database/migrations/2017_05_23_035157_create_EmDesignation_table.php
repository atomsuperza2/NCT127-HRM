<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmDesignation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('designation_id');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->time('shiftStart');
            $table->time('shiftEnd');
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
        Schema::dropIfExists('EmDesignation');
    }
}

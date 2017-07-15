<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('leavetype_id');
            $table->integer('status_id')->default('1');
            $table->integer('designation')->nullable();
            $table->integer('department')->nullable();
            $table->string('time')->nullable();
            $table->string('writeAt');
            $table->string('dear');
            $table->date('dateFrom');
            $table->date('dateTo');
            $table->date('dateApplied')->nullable();
            $table->integer('phone')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}

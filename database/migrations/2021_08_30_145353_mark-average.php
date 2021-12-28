<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarkAverage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_average',function (Blueprint $table){
            $table->increments('number');
            $table->string('majorCode');
            $table->string('classCode');
            $table->string('studentCode');
            $table->foreign('majorCode')->references('majorCode')->on('major')->onDelete('cascade');
            $table->foreign('classCode')->references('classCode')->on('grade')->onDelete('cascade');
            $table->foreign('studentCode')->references('studentCode')->on('student')->onDelete('cascade');
            $table->string('mark_average');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_average');
    }
}

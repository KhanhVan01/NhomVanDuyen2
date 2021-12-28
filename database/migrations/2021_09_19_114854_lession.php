<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lession', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weekday');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->softDeletes();
            $table->string('classCode');
            $table->string('subjectCode');
            $table->foreign('classCode')->references('classCode')->on('grade')->onDelete('cascade');;
            $table->foreign('subjectCode')->references('subjectCode')->on('subject')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lession');
    }
}

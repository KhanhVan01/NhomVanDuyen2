<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarkResit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_resit', function (Blueprint $table) {
            $table->increments('number');
            $table->string('studentCode');
            $table->string('subjectCode');
            $table->foreign('studentCode')->references('studentCode')->on('student')->onDelete('cascade');;
            $table->foreign('subjectCode')->references('subjectCode')->on('subject')->onDelete('cascade');;
            $table->string('mark_resit_final');
            $table->string('mark_resit_skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_resit');
    }
}

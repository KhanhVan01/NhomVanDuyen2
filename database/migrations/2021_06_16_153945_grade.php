<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->string('classCode',20)->primary();
            $table->string('nameClass',150)->unique();
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('course')->onDelete('cascade');;
            $table->string('majorCode');
            $table->foreign('majorCode')->references('majorCode')->on('major')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('studentCode',20)->primary();
            $table->string('email',255)->unique();
            $table->string('passWord',100);
            $table->string('firstName',255);
            $table->string('lastName',255);
            $table->date('dateOfBirth');
            $table->boolean('genDer');
            $table->string('phone',11)->unique();
            $table->string('address',255)->unique();
            $table->date('dateEnrollment');
            $table->string('classCode');
            $table->foreign('classCode')->references('classCode')->on('grade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}

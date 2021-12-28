<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarkSkillResitToMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mark', function (Blueprint $table) {
            $table->float('mark_skill_resit')->after('mark_final_resit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mark', function (Blueprint $table) {
            $table->dropColumn('mark_skill_resit');
        });
    }
}

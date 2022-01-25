<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('studentprofile')) return;
        Schema::create('studentprofile', function (Blueprint $table) {
            $table->id ('studentId');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('studentName');
            $table->string('studentPhone');
            $table->string('student_Skill');
            $table->string('skill_Level');

        });
        Schema::table('studentprofile', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studentprofile', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('studentprofile');
    }
}

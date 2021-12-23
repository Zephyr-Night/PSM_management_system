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

        Schema::create('studentprofile', function (Blueprint $table) {
            $table->id ('studentId');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('studentName');
            $table->string('studentPhone');
            $table->string('student_Skill');
            $table->string('skill_Level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentprofile');
    }
}

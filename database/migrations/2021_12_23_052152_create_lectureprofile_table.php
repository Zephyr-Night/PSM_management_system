<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectureprofile', function (Blueprint $table) {
            $table->id('lectureId');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('lectureName');
            $table->string('lecturePhone');
            $table->string('lecture_Skill');
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
        Schema::dropIfExists('lectureprofile');
    }
}

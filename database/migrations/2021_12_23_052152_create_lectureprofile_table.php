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

        if(Schema::hasTable('lectureprofile')) return;
        Schema::create('lectureprofile', function (Blueprint $table) {

            $table->id('lectureId');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('lectureName');
            $table->string('lecturePhone');
            $table->string('lecture_Skill');
            $table->string('skill_Level');

            //foreign key
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
        Schema::table('lectureprofile', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('lectureprofile');
    }
}

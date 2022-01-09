<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logbook', function (Blueprint $table) {
            $table->id();
            $table->date('meetingDate');
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->string('currentProgress');
            $table->string('discDetail');
            $table->string('actPlan');

            //foreign key
            $table->foreign('studentId')->references('studentId')->on('studentprofile');
            $table->foreign('lectureId')->references('lectureId')->on('lectureprofile');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbook');
            //
    }
}

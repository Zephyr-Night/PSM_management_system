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
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId')->nullable();
            $table->unsignedBigInteger('lectureId')->nullable();
            $table->date('meetingDate');
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->text('currentProgress');
            $table->text('discDetail');
            $table->text('actPlan');

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

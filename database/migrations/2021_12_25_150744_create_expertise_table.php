<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertise', function (Blueprint $table) {
            $table->id('expertiseID');
            $table->unsignedBigInteger('lectureId')->nullable()->index();
            $table->string('expertiseName');
            $table->string('expertiseLevel');

            //foreign key
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
        Schema::dropIfExists('expertise');
    }
}

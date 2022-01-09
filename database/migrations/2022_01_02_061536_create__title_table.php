<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_title', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lectureId')->nullable();
            $table->unsignedBigInteger('studentId')->nullable();
            $table->string('field');
            $table->string('project_title');
            $table->string('project_description');
            
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
        Schema::dropIfExists('_title');
        //
    }
}

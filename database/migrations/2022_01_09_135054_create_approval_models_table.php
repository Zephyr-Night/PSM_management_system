<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_models', function (Blueprint $table) {
            $table->id();
            $table->string('approvalStatus');
            $table->string('approvalReasons');


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
        Schema::dropIfExists('approval_models');
    }
}

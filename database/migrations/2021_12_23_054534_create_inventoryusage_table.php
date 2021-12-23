<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryusageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoryusage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId')->nullable();
            $table->unsignedBigInteger('lectureId')->nullable();
            $table->unsignedBigInteger('itemId')->nullable();
            $table->date('Startdate');
            $table->date('Enddate');
            $table->string('reason');
            $table->string('status');

            //foreign key
            $table->foreign('studentId')->references('studentId')->on('studentprofile');
            $table->foreign('lectureId')->references('lectureId')->on('lectureprofile');
            $table->foreign('itemId')->references('itemId')->on('inventory_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventoryusage');
    }
}

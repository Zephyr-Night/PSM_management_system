<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_usages', function (Blueprint $table) {
            $table->id();
            $table->integer('studentId')->unsigned()->nullable()->index();
            $table->integer('lecture_id')->unsigned()->nullable()->index();
            $table->integer('itemId')->unsigned()->nullable()->index();
            $table->date('Startdate');
            $table->date('Enddate');
            $table->string('reason');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_usages');
    }
}

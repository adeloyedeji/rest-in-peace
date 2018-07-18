<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropPropertyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_property_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('value');
            $table->integer('crop_grades_id')->unsigned();
            $table->timestamps();

            $table->foreign('crop_grades_id')->references('id')->on('crop_grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_property_datas');
    }
}

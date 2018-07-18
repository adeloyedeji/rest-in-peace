<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_crops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('properties_id')->unsigned();
            $table->string('name');
            $table->integer('total');
            $table->float('size');
            $table->integer('crop_grades_id')->unsigned();
            $table->integer('owner_present')->default(1); //yes
            $table->float('valuation');
            $table->date('date_of_enumeration');
            $table->text('remark')->nullable();
            $table->timestamps();
            
            $table->foreign('properties_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_crops');
    }
}

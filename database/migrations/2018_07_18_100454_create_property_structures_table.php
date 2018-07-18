<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('properties_id')->unsigned();
            $table->string('type');
            $table->text('address');
            $table->string('size');
            $table->string('area');
            $table->text('description');
            $table->date('date_of_inspection');
            $table->string('roof')->nullable();
            $table->string('ceiling')->nullable();
            $table->string('wall')->nullable();
            $table->string('window')->nullable();
            $table->string('door')->nullable();
            $table->string('fence')->nullable();
            $table->string('state_of_repairs')->nullable();
            $table->string('accomodation')->nullable();
            $table->string('proof')->nullable();
            $table->float('valuation_of_structure');
            $table->float('total_valuation');
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
        Schema::dropIfExists('property_structures');
    }
}

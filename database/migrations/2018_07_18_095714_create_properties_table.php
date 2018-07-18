<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiaries_id')->unsigned();
            $table->string('type');
            $table->string('ownership');
            $table->integer('approved')->default(0); //no
            $table->string('plan')->nullable();
            $table->integer('has_trees')->default(0); //no
            $table->string('others1')->nullable();
            $table->string('others2')->nullable();
            $table->string('others3')->nullable();
            $table->timestamps();

            $table->foreign('beneficiaries_id')->references('id')->on('beneficiaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

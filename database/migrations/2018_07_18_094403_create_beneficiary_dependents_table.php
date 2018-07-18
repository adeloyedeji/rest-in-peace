<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_dependents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiaries_id')->unsigned();
            $table->string('name');
            $table->integer('gender');
            $table->integer('age');
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
        Schema::dropIfExists('beneficiary_dependents');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiaries_id')->unsigned();
            $table->string('street');
            $table->integer('lgas_id')->unsigned();
            $table->integer('city');
            $table->integer('states_id')->unsigned();
            $table->timestamps();

            // $table->foreign('beneficiaries_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('lgas_id')->references('id')->on('lgas')->onDelete('cascade');
            // $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiary_addresses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_bios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiaries_id')->unsigned();
            $table->string('rt');
            $table->string('ri');
            $table->string('rm');
            $table->string('rr');
            $table->string('rb');
            $table->string('lt');
            $table->string('li');
            $table->string('lm');
            $table->string('lr');
            $table->string('lb');
            $table->timestamps();
            $table->foreign('beneficiaries_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiary_bios');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiaries_id')->unsigned();
            $table->integer('wives_total')->default(1);
            $table->integer('children_total')->default(0);
            $table->integer('occupations_id')->unsigned();
            $table->string('tribe');
            $table->enum('household_size', ['1 - 2', '3 - 6', '7 - 14', '15 - 20', 'Over 20']);
            $table->timestamps();

            // $table->foreign('beneficiaries_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            // $table->foreign('occupations_id')->references('id')->on('occupations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiary_details');
    }
}

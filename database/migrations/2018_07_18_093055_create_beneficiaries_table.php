<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('oname')->nullable();
            $table->integer('gender');
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('wives_total')->default(1);
            $table->integer('children_total')->default(0);
            $table->integer('occupations_id')->unsigned();
            $table->string('tribe');
            $table->string('household_head');
            $table->string('household_head_photo');
            $table->string('street');
            $table->integer('lgas_id')->unsigned();
            $table->string('city');
            $table->integer('states_id')->unsigned();
            $table->enum('household_size', ['1 - 2', '3 - 6', '7 - 14', '15 - 20', 'Over 20']);
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('occupations_id')->references('id')->on('occupations')->onDelete('cascade');
            $table->foreign('lgas_id')->references('id')->on('lgas')->onDelete('cascade');
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('occupations_id')->references('id')->on('occupations')->onDelete('cascade');
            $table->foreign('lgas_id')->references('id')->on('lgas')->onDelete('cascade');
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaries');
    }
}

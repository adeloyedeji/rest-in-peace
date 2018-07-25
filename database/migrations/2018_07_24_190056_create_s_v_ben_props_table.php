<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSVBenPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_v_ben_props', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_v_ben_id')->unsigned();
            $table->string('size_of_plot');
            $table->string('building_area');
            $table->string('roof');
            $table->string('ceiling');
            $table->string('wall');
            $table->string('window');
            $table->string('door');
            $table->string('fence');
            $table->string('state_of_repairs');
            $table->string('accomodation');
            $table->string('proof_document');
            $table->timestamps();

            $table->foreign('s_v_ben_id')->references('id')->on('s_v_bens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_v_ben_props');
    }
}

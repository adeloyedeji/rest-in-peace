<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSVBenBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_v_ben_bios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_v_ben_id')->unsigned();
            $table->string('passport');
            $table->string('rthumb');
            $table->string('lthumb');
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
        Schema::dropIfExists('s_v_ben_bios');
    }
}

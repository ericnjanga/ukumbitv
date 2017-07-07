<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id');
            $table->string('imgBillboard'); //1200x650
            $table->string('imgSmall1');
            $table->string('imgSmall2');    //500x340
            $table->string('imgSmall3');
            $table->string('imgPreview');   //1000x600
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videoimages');
    }
}

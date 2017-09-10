<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_producers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique(); //1200x650
            $table->integer('royalties');
            $table->date('contract_expiration');    //500x340
            $table->integer('producer_agent_id')->nullable();
            $table->string('email')->unique();   //1000x600
            $table->string('password');   //1000x600
            $table->string('description')->nullable();   //1000x600
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
        Schema::drop('movie_producers');
    }
}

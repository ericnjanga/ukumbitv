<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('genre_id');
            $table->integer('video');
            $table->integer('trailer_video');
            $table->string('ratings');
            $table->string('reviews');
            $table->string('actors')->nullable();
            $table->string('directors')->nullable();
            $table->string('watchid')->nullable();
            $table->integer('lang_id')->nullable();
            $table->string('year')->nullable();
            $table->integer('movie_producer_id')->nullable();
            $table->string('country')->nullable();
            $table->string('tags')->nullable()->default(NULL);
            $table->string('length')->nullable()->default(NULL);
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
        Schema::drop('admin_videos');
    }
}

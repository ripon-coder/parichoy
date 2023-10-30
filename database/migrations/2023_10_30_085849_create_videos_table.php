<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_categories_id');
            $table->string('slug')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('youtube_id')->nullable();
            $table->text('description')->nullable();
            $table->json('others')->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('video_categories_id')->references('id')->on('video_categories');
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
        Schema::dropIfExists('videos');
    }
}

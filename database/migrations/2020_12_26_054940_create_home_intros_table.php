<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_intros', function (Blueprint $table) {
            $table->id();
            $table->longText('instra_link')->nullable();
            $table->longText('fb_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('youtube_link')->nullable();
            $table->longText('google_link')->nullable();
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
        Schema::dropIfExists('home_intros');
    }
}

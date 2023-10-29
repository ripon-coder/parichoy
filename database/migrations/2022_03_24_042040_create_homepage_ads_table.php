<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_1')->nullable();
            $table->string('ad_2')->nullable();
            $table->string('ad_3')->nullable();
            $table->string('ad_4')->nullable();
            $table->string('ad_5')->nullable();
            $table->string('ad_6')->nullable();
            $table->string('ad_7')->nullable();
            $table->string('ad_8')->nullable();
            $table->string('ad_9')->nullable();
            $table->string('ad_10')->nullable();
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
        Schema::dropIfExists('homepage_ads');
    }
}

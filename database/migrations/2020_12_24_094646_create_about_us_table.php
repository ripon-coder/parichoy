<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic')->nullable();
            $table->longText('profile_description')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('phone_three')->nullable();
            $table->string('phone_four')->nullable();
            $table->string('email')->nullable();
            $table->string('email_two')->nullable();
            $table->string('email_three')->nullable();
            $table->longText('address')->nullable();
            $table->longText('embeded_link')->nullable();
            $table->string('instra_link')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('google_link')->nullable();
            $table->string('dashboard_image')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('favicon_icon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('terms_of_use')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('about_us');
    }
}

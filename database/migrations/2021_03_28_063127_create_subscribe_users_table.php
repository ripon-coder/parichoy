<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_users', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('slug');
            $table->string('phone');
            $table->integer('yearOfBirth');
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->string('member_plan');
            $table->text('usa_address');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('country');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('other_social')->nullable();
            $table->longText('information')->nullable();
            $table->string('profile_img')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('duration')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('subscribe_users');
    }
}

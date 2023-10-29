<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // $table->integer('parent_category_id');
            $table->unsignedInteger('parent_category_id')->nullable();
            $table->foreign('parent_category_id')->references('id')->on('categories');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('categories');
    }
}

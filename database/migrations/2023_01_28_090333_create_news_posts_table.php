<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('news_title');
            $table->string('news_title_slug')->nullable();
            $table->string('image')->nullable();
            $table->text('news_details')->nullable();
            $table->text('tags')->nullable();
            $table->integer('breaking_news')->nullable();
            $table->integer('top_slider')->nullable();
            $table->integer('first_section_three')->nullable();
            $table->integer('first_section_nine')->nullable();
            $table->string('post_date');
            $table->string('post_month');
            $table->integer('status')->default(1)->nullable();
            $table->integer('view_count')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_posts');
    }
};

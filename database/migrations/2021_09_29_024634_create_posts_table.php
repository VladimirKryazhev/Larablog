<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();


            $table->index('category_id', 'post_category_idx');// текущая таблица прописывается и таблица, с которой идет связь, это таб категория. Все таблицы в единственном числе пишем.
            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

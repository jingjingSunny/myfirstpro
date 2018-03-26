<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title',255)->comment('文章标题');
			$table->string('descr',255)->comment('文章简介');
			$table->text('content')->comment('文章详情');
			$table->string('picture',255)->comment('文章图片');
			$table->integer('cate_id')->comment('所属分类');
			$table->integer('user_id')->comment('用户id');
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
        Schema::drop('articles');
    }
}

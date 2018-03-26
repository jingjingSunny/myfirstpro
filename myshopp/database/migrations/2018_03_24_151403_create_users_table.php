<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',16)->comment('用户昵称');
            $table->string('password',50)->comment('用户密码');
            $table->tinyInteger('status')->comment('用户状态：1开启 0关闭');
            $table->tinyInteger('auth')->comment('用户权限：1超管理员 2普通管理员 3用户');
            $table->string('picture',50);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

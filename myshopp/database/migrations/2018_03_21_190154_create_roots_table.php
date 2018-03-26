<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roots', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name',30);
			$table->string('password',50)->comment('管理员密码');
			$table->tinyInteger('auth')->comment('管理员权限：1超管理员 2普通管理员 3用户');
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
        Schema::drop('roots');
    }
}

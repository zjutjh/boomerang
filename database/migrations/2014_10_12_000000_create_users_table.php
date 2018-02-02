<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id')->comment('用户id');
            $table->string('name')->comment('用户姓名');
            $table->string('uno')->unique()->comment('用户学号');
            $table->string('qq')->unique()->nullable()->comment('用户qq');
            $table->string('wechat')->unique()->nullable()->comment('用户微信');
            $table->string('phone')->unique()->nullable()->comment('用户电话');
            $table->string('openid')->unique()->comment('微信自动登录');
            $table->tinyInteger('user_type')->default(1)->comment('用户权限设置 默认普通用户 （1：普通用户 2：普通管理员 3 超级管理员）');
            $table->tinyInteger('user_group')->default(1)->comment('用户组');
            //$table->json('ext')->comment('拓展字段');
            $table->rememberToken()->comment('登录');
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
        Schema::dropIfExists('users');
    }
}

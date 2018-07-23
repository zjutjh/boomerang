<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatAnnouncementTable extends Migration{
    public function up(){
        Schema::create('announcement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('content')->comment('公告内容');
            $table->tinyInteger('status')->default(0)->comment('状态, 是否更换为最新，0为最新，1为过期');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('announcement');
    }
}

/**
 * Created by PhpStorm.
 * User: 20170
 * Date: 2018/7/23
 * Time: 21:23
 */
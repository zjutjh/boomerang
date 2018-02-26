<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->comment('物品id');
            $table->string('uid')->comment('发布人id');
            $table->string('title')->comment('物品名称');
            $table->text('description')->comment('物品描述');
            $table->text('lost_place')->comment('丢失地点');
            $table->tinyInteger('lost_type')->comment('类型,招领还是寻物, 01表示');
            //$table->string('type_id')->comment('分类id');
            $table->string('contact_uno')->comment('联系人学号，只限招领并且为校园卡使用，做通知用');
            $table->text('images')->nullable()->comment('物品图片地址 暂时string 测试上线改为json');
            $table->string('phone')->nullable()->comment('联系电话');
            $table->string('qq')->nullable()->comment('联系qq');
            $table->tinyInteger('status')->default(0)->comment('状态, 是否确认寻回，0 为未寻回 1表示寻回');
            $table->tinyInteger('deleted')->default(0)->comment('是否软删除 1为软删除 ');
            $table->integer('views')->default(0)->comment('浏览次数');
            $table->timestamps();

            $table->index(['uid', 'id']);


//            $table->string()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}

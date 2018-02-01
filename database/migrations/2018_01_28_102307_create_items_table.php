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
            $table->string('lost_type')->comment('类型,招领还是寻物, 01表示');
            $table->string('type_id')->comment('分类id');
            $table->string('contact_uno')->comment('联系人学号，只限招领并且为校园卡使用，做通知用');
            $table->string('img_url')->comment('物品图片地址 暂时string 测试上线改为json');
            $table->string('contact_phone')->comment('联系电话');
            $table->string('contact_qq')->comment('联系qq');
            $table->tinyInteger('status')->comment('状态, 是否确认寻回，01表示');
            $table->string('deleted')->comment('是否软删除');
            $table->string('views')->comment('浏览次数');
            $table->timestamps();

            $table->index(['uid', 'type_id', 'id']);


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

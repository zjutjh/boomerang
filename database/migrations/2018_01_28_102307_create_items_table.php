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
            $table->increments('item_id')->comment('物品id');
            $table->string('u_id')->comment('发布人id');
            $table->string('item_name')->comment('物品名称');
            $table->text('item_des')->comment('物品描述');
            $table->text('item_lost_place')->comment('丢失地点');
            $table->string('type_id')->comment('分类id');
            $table->string('img_url')->comment('物品图片地址');
            $table->string('contact_phone')->comment('联系电话');
            $table->string('contact_qq')->comment('联系qq');
            $table->string('view_count')->comment('浏览次数');
            $table->timestamps();

            $table->index(['u_id', 'type_id', 'item_id']);


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

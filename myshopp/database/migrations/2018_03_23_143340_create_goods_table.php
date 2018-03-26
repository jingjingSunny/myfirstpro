<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gName',50)->comment('商品名称');
            $table->decimal('gPrice',50)->comment('商品价格');
            $table->string('gImg',150)->comment('商品图片');
            $table->integer('gStock')->comment('商品库存');
            $table->tinyInteger('isSale')->default(1)->comment('是否上架,0:不上架 1:上架');
            $table->tinyInteger('isBest')->default(0)->comment('是否精品,0:否 1:是');
            $table->tinyInteger('isHot')->default(0)->comment('是否热销产品,0:否 1:是');
            $table->tinyInteger('isNew')->default(0)->comment('是否新品,0:否 1:是');
            $table->integer('cateId')->comment('所属类别');
            $table->integer('brandId')->comment('品牌ID');
            $table->text('gDesc')->comment('商品描述');
            $table->integer('saleNum')->default(0)->comment('总销售量');
            $table->integer('visitNum')->default(0)->comment('访问数');
            $table->integer('appraiseNum')->default(0)->comment('评价数');
            $table->string('gColor')->comment('商品颜色');
            $table->string('gSize')->comment('商品大小');
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
        Schema::drop('goods');
    }
}

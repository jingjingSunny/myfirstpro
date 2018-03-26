<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $color=['白色','黑色','复古蓝','中国红','可爱粉','苹果绿','灰色'];
        for($i=1;$i<=100;$i++){
        	DB::table('goods')->insert([
            'gName' => str_random(10),
            'gPrice'=>rand(30.45,1000.45),
            'gImg' => rand(1,10)."."."jpg",
            'gStock'=>rand(0,1000),
            'isSale'=>rand(0,1),
            'isBest'=>rand(0,1),
            'isHot'=>rand(0,1),
            'isNew'=>rand(0,1),
            'cateId'=>rand(0,17),
            'brandId'=>rand(1,8),
            'gDesc'=>str_random(50),
            'saleNum'=>rand(0,1000),
            'visitNum'=>rand(0,1000),
            'appraiseNum'=>rand(0,1000),
            'gColor'=>$color[rand(0,6)],
            'gSize'=>'35,36,37,38,39,40',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        	]);
        }
    }
}

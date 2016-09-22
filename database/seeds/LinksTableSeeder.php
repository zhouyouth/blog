<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
             [
                 'link_name'=>'牛博网',
                 'link_title'=>'牛逼',
                 'link_url' =>'www.houdunwang.com',
                 'link_order' =>2,
             ],
            [
                'link_name'=>'自学it',
                'link_title'=>'牛逼',
                'link_url' =>'www.houdunwang.com',
                'link_order' =>2,
            ],
        ];
        DB::table('links')->insert($data);
    }
}

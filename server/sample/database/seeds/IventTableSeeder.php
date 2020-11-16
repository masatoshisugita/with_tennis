<?php

use Illuminate\Database\Seeder;

class IventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ivents = [
             ['user_id' => 1,
             'title' => '一緒にテニスをしましょう',
             'place' => '東京都港区',
             'date' => '2020-11-15 13:00:00',
             'detail' => '終わった後には打ち上げします'
            ],
            [
             'user_id' => 2,
             'title' => '楽しくテニスをしましょう',
             'place' => '東京都多摩市',
             'date' => '2020-11-15 13:00:00',
             'detail' => '4人でやります。終わった後には打ち上げします'
            ],
            [
             'user_id' => 1,
             'title' => 'みんなでテニスをしましょう',
             'place' => '北海道札幌市',
             'date' => '2020-11-15 13:00:00',
             'detail' => '経験者求む'
            ]
        ];
            

        foreach($ivents as $ivent) {
            \App\Ivent::create($ivent);
        }
    }
}

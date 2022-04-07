<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ingredients')->insert([
            [
                'name' => '佐藤',
                'price' => '10000',
                'weight' => '1000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '村岡さんの',

            ],
            [
                'name' => '砂糖',
                'price' => '10000',
                'weight' => '1000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '佐藤物産',

            ],
            [
                'name' => '生クリーム',
                'price' => '20000',
                'weight' => '1000',
                'g_price' => '200',
                'p_date' => '2022-05-19',
                'p_camp' => 'テスト物産',

            ],
            [
                'name' => 'チョコレート',
                'price' => '30000',
                'weight' => '1000',
                'g_price' => '300',
                'p_date' => '2022-05-19',
                'p_camp' => '佐藤物産',

            ],
            [
                'name' => '小麦粉',
                'price' => '40000',
                'weight' => '2000',
                'g_price' => '200',
                'p_date' => '2022-05-19',
                'p_camp' => '佐藤物産',

            ],
            [
                'name' => '佐藤',
                'price' => '50000',
                'weight' => '5000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '鈴木物産',

            ],

        ]);


    }
}

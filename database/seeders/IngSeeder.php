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
                'name' => '砂糖',
                'price' => '10000',
                'status' => true,
                // 'unit' => 'guramu',
                'weight' => '1000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '村岡さんの',

            ],
            [
                'name' => '小麦',
                'price' => '20000',
                'status' => true,
                // 'unit' => 'guramu',
                'weight' => '1000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '村岡さんの',

            ],
            [
                'name' => '生クリーム',
                'price' => '10000',
                'status' => true,
                // 'unit' => 'guramu',
                'weight' => '1000',
                'g_price' => '100',
                'p_date' => '2022-05-19',
                'p_camp' => '村岡さんの',

            ],
            
            
            
            

        ]);


    }
}

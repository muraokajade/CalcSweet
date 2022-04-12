<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CakeSeeder extends Seeder
{
    
        public function run()
    {
         DB::table('cakes')->insert([
            [
                'name' => 'ショートケーキ',
                'price' => 300,
 
            ],
            [
                'name' => 'チョコレートケーキ',
                'price' => 300,
 
            ],
            [
                'name' => '旭南オリジナル',
                'price' => 300,
 
            ],
           
            
        ]);
}}

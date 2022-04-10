<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{

    public function run()
    {
         DB::table('recipes')->insert([
            [
                'product_id' => 1,
                'ingredient_id' => 2,
                'amoount' => 200,
 
            ],
            [
                'product_id' => 2,
                'ingredient_id' => 4,
                'amoount' => 300,
 
            ],
            
        ]);
            
    }
}

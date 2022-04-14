<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredients;
use App\Models\Cake;
use App\Models\Recipe;
class RecipeController extends Controller
{

    public function index()
    {
        $cakes = Cake::all();
        // dd($cakes);
        return view('recipes.index',compact('cakes'));
    }

    public function create()
    {
        $cakes = Cake::all();
        $ingredients = Ingredients::all();
        // dd($ingredients);
        return view('recipes.create', compact('ingredients', 'cakes'));
    }



    public function store(Request $request)
    {
        //新規登録
        // dd($request->name);
;        $cake = Cake::create([
            'name' => $request->name,
            'raw_price' => 0, //ingから計算する
            'number' => 0,
        ]);
        
        foreach($request->ing_id as $index=>$ing_id) {
            //その後でrexipe登録
            Recipe::create([
                'cake_id' => $cake->id,
                'ingredient_id' => $ing_id,
                'name' => '',
                'amount' => $request->amount[$index],
            ]);
        }
        
        // dd($cake->id);//
        
        $recipes = Recipe::Where('cake_id',$cake->id)->get();
        $ing_ids = $recipes->pluck('ingredient_id');
        
        // dd($ing_ids);
        $ingredients = Ingredients::Where('id', $ing_id)->get();
        // dump($ingredients);
        $result = 0;
        foreach($recipes as $recipe) {
            foreach($ingredients as $ingredient) {
            // $ing_ids = $recipe->pluck('ingredient_id')->contains($ingredient->id);
            $recipes_ing_id = $recipe->ingredient_id;
            $ing_id = $ingredient->pluck('id');
            dump($recipes_ing_id,$ing_id);

            if($ing_id->contains($recipes_ing_id)) {
                dump($result += $recipe->amount * $ingredient->g_price);
                dump($result);
            }
            
                
            }
        }
        
        
        // $ing_price = $recipe->ingredient_id;
        // dd($recipe, $ing_price);
        
        // $cake_ids = Recipe::all()->sortBy('cake_id')->pluck('cake_id');
        // dd($cake_ids);
        
        //priceを計算し、update
        //トランザクション
        
        $cake->update([
            'price' => 0,
        ]);

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

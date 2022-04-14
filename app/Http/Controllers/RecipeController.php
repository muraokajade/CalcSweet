<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredients;
use App\Models\Cake;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
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
        
        try {
            DB::transaction(function () use ($request) {
                $cake = Cake::create([
                'name' => $request->name,
                'raw_price' => 0, //ingから計算する
                'number' => $request->number,
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
                $recipes = Recipe::Where('cake_id',$cake->id)->get();
                $ing_ids = $recipes->pluck('ingredient_id');
                $ingredients = Ingredients::Where('id', $ing_id)->get();
                $result = 0;
                $count = (int)$cake->number;
        // dump($count);
            foreach($recipes as $recipe) {
                foreach($ingredients as $ingredient) {
                // $ing_ids = $recipe->pluck('ingredient_id')->contains($ingredient->id);
                $recipes_ing_id = $recipe->ingredient_id;
                $ing_id = $ingredient->pluck('id');
                // dump($recipes_ing_id,$ing_id);
    
                if($ing_id->contains($recipes_ing_id)) {
                    $result += $recipe->amount * $ingredient->g_price;
                    
                }
                
                    
                }
            }
            
        $raw_price = $result / $count;
        
        $cake->update([
            'raw_price' => $raw_price,
        ]);
                
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('cakes.index')
            ->with(['message' => 'レシピ作成しました', 'status' => 'info']);
    
        
        

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

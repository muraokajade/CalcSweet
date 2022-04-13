<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredients;
use App\Models\Cake;
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
        $cake = Cake::create([
            'name' => $request->name,
            'price' => 0, //ingから計算する
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

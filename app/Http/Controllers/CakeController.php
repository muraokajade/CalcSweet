<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Recipe;
use App\Models\Ingredients;
use Illuminate\Http\Request;

class CakeController extends Controller
{

    public function index()
    {
        $cakes = Cake::all();
        
        return view('cakes.index', compact('cakes'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    
    // まず、材料があるケーキに使われているかチェックする、
    // Cakeモデルのメソッド isUsedByBy を作成します。
    public function isUsedBy($id) {
        $cake = Cake::findOrfail($id);
    }


    public function show($id)
    {
        $cake = Cake::findOrfail($id);
        var_dump($cake);
        $ingredients = $cake->Ingredients;
        // $recipes = '';
        // //取り出し方
        // foreach ($ingredients as $ingredient) {
        // $recipes = Recipe::Where('cake_id', $cake->id)->get();
        // }
        // dd($recipes);
        
        return view('cakes.show', $cake, compact('cake', 'ingredients', 'recipes'));
        
        
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

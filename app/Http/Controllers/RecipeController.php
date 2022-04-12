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
        $ingredients = Ingredients::all();
        // dd($ingredients);
        return view('recipes.create', compact('ingredients'));
    }



    public function store(Request $request)
    {
        
        dd($request);
        
        
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

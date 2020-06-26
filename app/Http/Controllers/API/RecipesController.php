<?php

namespace App\Http\Controllers\API;

use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    public function new(Request $request){
        $recipe = new Recipes;
        $recipe->name       = $request->name;
        $recipe->description= $request->description;
        if($recipe->save()){
            return ['Result'=>true];
        }
    }

    public function update(Request $request){
        $recipe = Recipes::find($request->id);
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        if($recipe->save()){
            return ['Result'=>true];
        }
    }

    public function findAll(){
        return Recipes::all();
    }
}

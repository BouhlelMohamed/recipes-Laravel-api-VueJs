<?php

namespace App\Http\Controllers\API;

use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    public function new(Request $request){
        $recipe = new Recipes;
        $recipe->name       = $request->name;
        $recipe->description= $request->description;
        $recipe->number_of_person       = $request->number_of_person;
        $recipe->cooking_time= $request->cooking_time;
        $recipe->preparation_time= $request->preparation_time;
        if($recipe->save()){
            // GET ID FOR INSERT BEST IMAGE WITH ID . EXT
            $file = $request->file('image');
            if(!is_null($file)){
                $extension     = $file->getClientOriginalExtension();
                $fileName      = $recipe->id.'.'.$extension;
                $file->move(public_path("../views-template/upload/images/best_images/"),$fileName);
                $recipe->image = $fileName;
                $recipe->save();
            }
            return ['Result'=>true];
        }
    }

    public function update(Request $request){
        $recipe = Recipes::find($request->id);
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->number_of_person       = $request->number_of_person;
        $recipe->cooking_time= $request->cooking_time;
        $recipe->preparation_time= $request->preparation_time;
        if($recipe->save()){
            // GET ID FOR INSERT BEST IMAGE WITH ID . EXT
            $file = $request->file('image');
            if(!is_null($file)){
                $extension     = $file->getClientOriginalExtension();
                $fileName      = $recipe->id.'.'.$extension;
                $file->move(public_path("../views-template/upload/images/best_images/"),$fileName);
                $recipe->image = $fileName;
                $recipe->save();
            }
            return ['Result'=>true];
        }
    }

    public function findAll(){  
        $recipesList = Recipes::paginate(3);
        return response()->json($recipesList,200);
        // return Recipes::all();
    }

    public function deleteRecipes(int $iRecipeId){
        Recipes::find($iRecipeId)->delete();
        return response()->json(null,204);
    }

    public function findOneRecipe(int $iRecipeId){
        $recipe = Recipes::find($iRecipeId);
        return response()->json($recipe,200);
    }
}

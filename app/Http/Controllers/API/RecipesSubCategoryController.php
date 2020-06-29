<?php

namespace App\Http\Controllers\API;

use App\RecipesSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipesSubCategoryController extends Controller
{
    public function addRecipesToSubCategory(Request $request){
        $recipesToSubCategory = new RecipesSubCategory;
        $recipesToSubCategory->recipes_id = $request->recipes_id;
        $recipesToSubCategory->sub_category_id = $request->sub_category_id;
        $recipesToSubCategory->save();
    }

    public function deleteRecipesToSubCategory(Request $request){
        RecipesSubCategory::find($request->id)->delete();
        return response()->json(null,204);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorysController extends Controller
{
    public function new(Request $request){
        $category = new Category();
        $category->name       = $request->name;
        if($category->save()){
            return ['Result'=>true];
        }
    }

    public function update(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        if($category->save()){
            return ['Result'=>true];
        }
    }

    public function findAll(){  
        $categorysList = Category::all();
        return response()->json($categorysList,200);
        // return categorys::all();
    }

    public function deletecategory(int $iCategoryId){
        Category::find($iCategoryId)->delete();
        return response()->json(null,204);
    }

    public function findOnecategory(int $iCategoryId){
        $category = Category::find($iCategoryId);
        return response()->json($category,200);
    }

}

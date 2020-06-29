<?php

namespace App\Http\Controllers\API;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategorysController extends Controller
{
    public function new(Request $request){
        $subCategory = new SubCategory();
        $subCategory->name       = $request->name;
        if($subCategory->save()){
            return ['Result'=>true];
        }
    }

    public function update(Request $request){
        $subCategory = SubCategory::find($request->id);
        $subCategory->name = $request->name;
        if($subCategory->save()){
            return ['Result'=>true];
        }
    }

    public function findAll(){  
        $subCategoryList = SubCategory::all();
        return response()->json($subCategoryList,200);
        // return SubCategorys::all();
    }

    public function deleteSubCategory(int $iSubCategoryId){
        SubCategory::find($iSubCategoryId)->delete();
        return response()->json(null,204);
    }

    public function findOneSubCategory(int $iSubCategoryId){
        $subCategory = SubCategory::find($iSubCategoryId);
        return response()->json($subCategory,200);
    }

    public function addSubCategoryToCategory(Request $request){
        dump($request);
    }

}

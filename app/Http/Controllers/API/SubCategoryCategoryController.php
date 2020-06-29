<?php

namespace App\Http\Controllers\API;

use App\SubCategoryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryCategoryController extends Controller
{
    public function addSubCategoryToCategory(Request $request){
        $subCategoryToCategory = new SubCategoryCategory;
        $subCategoryToCategory->category_id = $request->category_id;
        $subCategoryToCategory->sub_category_id = $request->sub_category_id;
        $subCategoryToCategory->save();
    }

    public function deleteSubCategoryToCategory(Request $request){
        SubCategoryCategory::find($request->id)->delete();
        return response()->json(null,204);
    }
}

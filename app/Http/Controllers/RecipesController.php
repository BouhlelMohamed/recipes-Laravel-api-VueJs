<?php

namespace App\Http\Controllers;

use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class RecipesController extends Controller
{
    public function findAll(){
        return Recipes::all();
    }
}

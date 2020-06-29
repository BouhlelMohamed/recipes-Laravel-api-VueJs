<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipesSubCategory extends Model
{
    public function __construct()
    {
        $this->setTable('sub_category_recipes');
    }
}

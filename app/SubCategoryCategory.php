<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryCategory extends Model
{
    public function __construct()
    {
        $this->setTable('category_sub_category');
    }
}

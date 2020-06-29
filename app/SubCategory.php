<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function __construct()
    {
        $this->setTable('sub_categorys');
    }
}

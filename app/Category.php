<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public $guarded = [];
    public function __construct()
    {
        $this->setTable('categorys');
    }
    // for get name of table
    // public function getNameTable()
    // {
    //     return with(new static)->getTable();    
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ListCategory extends Model
{
    public static function findBySlug($slug){
        return ListCategory::where('slug',$slug)->first();
    }
}

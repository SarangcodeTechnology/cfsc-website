<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lists extends Model
{
    public function scopeGetLists($query, $category_id)
    {
        return $query->where('category_id', $category_id)->orderBy('created_at', 'desc')->get();
    }

    public function category()
    {
        return $this->belongsTo(ListCategory::class, 'category_id');
    }

    public function scopeGetCategory($query, $category)
    {
        return  $data =  $query->where('category_id', ListCategory::where('slug', $category)->first()->id);
    }
}

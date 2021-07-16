<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    public function scopeGetSidebar($query,$slug){
        $url = '/d/'.$slug;
        $menu_id = $query->where('url',$url)->first()->parent_id;

        if($menu_id){
            $menu = MenuItem::where('id',$menu_id)->first();
            $hasParent = 1;
        }
        else{
            // let's find any submenu
            $submenu_id = MenuItem::where('menu_id',2)->where('parent_id','!=',null)->first()->parent_id;
            $menu = MenuItem::where('menu_id',2)->where('id',$submenu_id)->first();
            $hasParent = 0;

        }

        $lists = MenuItem::where('parent_id',$menu->id)->orderBy('order')->get(['title','url']);
        $sidebar = collect([
            'hasParent'=>$hasParent,
            'title'=>$menu->title,
            'lists'=>$lists]);


        return $sidebar;
    }
}

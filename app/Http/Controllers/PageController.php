<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\ListCategory;
use App\Lists;
use App\MenuItem;
use App\Page;
use App\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        $modal = Lists::where('modal', 1)->orderBy('created_at', 'desc')->get();
        $recent_notices = Lists::getCategory('notices')->orderBy('created_at', 'desc')->take(5)->get();
        $recent_programs = Lists::getCategory('programs')->orderBy('created_at', 'desc')->take(5)->get();
        $recent_resources = Lists::getCategory('downloads-others')->orderBy('created_at', 'desc')->take(5)->get();
        return view('index', compact(
            'sliders',
            'modal',
            'recent_notices',
            'recent_programs',
            'recent_resources'
        ));
    }

    // to get dynamic page, page/lists-category should be there inside database
    public function dynamicPage($slug)
    {

        $page = Page::findBySlug($slug);
        $list_category = ListCategory::findBySlug($slug);
        $recent_notices = Lists::getCategory('notices')->orderBy('created_at', 'desc')->take(3)->get();
        $recent_programs = Lists::getCategory('programs')->orderBy('created_at', 'desc')->take(3)->get();
        $recent_resources = Lists::getCategory('downloads-others')->orderBy('created_at', 'desc')->take(3)->get();
        // page bhaye pani category bhayepani yaha bhitra janxa
        if ($page || $list_category) {
            // sidebar dinchha from scope
            $sidebar = MenuItem::getSidebar($slug);
            $s_title = $sidebar['title'];
            $s_lists = $sidebar['lists'];
            $hasParent = $sidebar['hasParent'];

            // dynamic view
            $view =  $page ? 'page' : 'lists';
            // body for page or for Lists
            $body =  $page ? $page->body : Lists::getLists($list_category->id);
            // whole page or list_category data
            $data = $page ? $page : $list_category;

            return view('dynamic.' . $view, compact(
                's_title',
                's_lists',
                'hasParent',
                'body',
                'data',
                'recent_notices',
                'recent_programs',
                'recent_resources'
            ));
        }

        return abort('404');
    }

    // to get static page, make file inside static(in view) For eg: make demo.blade.php inside static folder and check out domain.com/s/page/demo. you will get your result
    public function staticPage($slug, Request $request)
    {
        if ($request->galleryid) {
            $gallery = Gallery::find($request->galleryid);
            return view('static.gallerylists', compact(
                'gallery'
            ));
        }
        $recent_notices = Lists::getCategory('notices')->orderBy('created_at', 'desc')->take(3)->get();
        $recent_programs = Lists::getCategory('programs')->orderBy('created_at', 'desc')->take(3)->get();
        $recent_resources = Lists::getCategory('downloads-others')->orderBy('created_at', 'desc')->take(3)->get();
        // it will check whether view exists or not
        if (view()->exists('static.' . $slug)) {
            return view('static.' . $slug, compact(
                'recent_notices',
                'recent_programs',
                'recent_resources'
            ));
        }
        // otherwise throw 404;
        return abort('404', "Page Not Found");
    }
}

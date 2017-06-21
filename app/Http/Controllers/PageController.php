<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    
    public function index()
    {
        $page = Page::where('route', '/')->where('active', 1)->first();

        return view($page->template)
            ->with('page', $page);
    }

    public function getPage($slug = null)
    {
        $page = Page::where('slug', $slug )->where('status', 'active')->get();
        // $page = Page::all();

        // echo "got page";
        dd($page);
        // $page = $page->firstOrFail();

        // return view($page->template)->with('page', $page);
    }
}

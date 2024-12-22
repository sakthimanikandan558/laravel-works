<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function displayFun(Request $request)
    {
        $pages = Page::paginate(10);

        if ($request->ajax()) {
            return view('partials.userlist', compact('pages'))->render();
            return response()->view('partials.userlist', compact('pages'))->setStatusCode(409); 
        }

        return view('userlist', compact('pages'));
    }
}
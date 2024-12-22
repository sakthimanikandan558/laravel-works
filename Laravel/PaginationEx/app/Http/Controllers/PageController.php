<?php

namespace App\Http\Controllers;
use App\Models\Page;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function displayFun(){
        $pages = Page::paginate(10); // Fetch 10 records per page
        return view('userlist', compact('pages'));    }
}

<?php

use IbrahimBougaoua\Filawidget\Services\AreaService;
use IbrahimBougaoua\Filawidget\Services\PageService;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    $pages =  PageService::getAllPages();
    $areas =  AreaService::getAllAreas();

    return view('welcome', [
        'pages' => $pages,
        'areas' => $areas,
    ]);
});
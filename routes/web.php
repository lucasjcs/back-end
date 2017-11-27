<?php


Route::get('/', function () {
    return view('site/index');
});

Route::get('/delivery/{slug}', function () {
    return view('site/company');
});


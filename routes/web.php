<?php


Route::get('/', function () {
    return view('site/index');
});

Route::get('/{id}', function () {
    return view('site/company');
});
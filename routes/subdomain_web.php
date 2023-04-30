<?php

use Illuminate\Support\Facades\Route;

// subdomain routes

Route::get('/', function () {
    return view('skill');
});


Route::get('/test', function () {
    return 'test subdomain';
});

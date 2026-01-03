<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<h1>First Logic with Laravel</h1>';
});

Route::get('/other', function () {
    return '<h1>Second Logic with Laravel</h1>';
});

Route::get('/products', [ProductController::class, 'list']);

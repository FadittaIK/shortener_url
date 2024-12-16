<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::post('url',[UrlController::class,'store']);
//Route::post('url', [UrlController::class, 'store']);

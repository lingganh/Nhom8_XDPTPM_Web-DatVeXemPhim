<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// API film admin

Route::apiResource('films', 'Backend\FilmController')->middleware('auth:sanctum');


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Class & Section Controller Path...
use App\Http\Controllers\API\ClassController;
use App\Http\Controllers\API\SectionController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    //return $request->user();

    return response()->json([
        'status' => true,
        'message' => 'oi'
    ], 200);
});

Route::get('/home', [App\Http\Controllers\Soccer::class, 'home']);

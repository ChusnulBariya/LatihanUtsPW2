<?php

use App\Http\Controllers\KucingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/kucing', [KucingController::class, 'index']);
Route::post('/kucing',[KucingController::class, 'store']);
Route::patch('/kucing/{kucing}',[KucingController::class, 'update']);
Route::delete('/kucing/{kucing}',[KucingController::class, 'destroy']);
Route::get('/kucing/{kucing}',[KucingController::class, 'show']);

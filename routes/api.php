<?php


use \Illuminate\Support\Facades\Route;

//
//Route::get('posts', [\App\Http\Controllers\PostController::class ,'index' ]);
//Route::post('posts', [\App\Http\Controllers\PostController::class ,'store' ]);
//Route::get('posts/{id}', [\App\Http\Controllers\PostController::class ,'show' ]);
//Route::put('posts/{id}', [\App\Http\Controllers\PostController::class ,'update' ]);
//Route::delete('posts/{id}', [\App\Http\Controllers\PostController::class ,'destroy' ]);

Route::apiResource('posts', \App\Http\Controllers\PostController::class);
Route::apiResource('users', \App\Http\Controllers\UserController::class);

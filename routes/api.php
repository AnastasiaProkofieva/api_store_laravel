<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api as Api;
use App\Http\Controllers\Auth as Auth;
use Illuminate\Support\Facades\Route;


/** Common  */
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [Api\Common\ProductController::class, 'index']);
    Route::get('/filters', [Api\Common\ProductController::class, 'filtered']);
});
/** Auth */
Route::post('register', [Auth\RegisterController::class, 'store']);
Route::apiResource('login', Auth\LoginController::class);

/** User Orders */
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user/orders'], function () {
    Route::get('/', [Api\User\ProductUserController::class, 'index']);
    Route::post('/buy/{product}', [Api\User\ProductUserController::class, 'buy']);
});
/** User Comments */
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user/comments'], function () {
    Route::get('/', [Api\User\CommentController::class, 'index']);
    Route::post('/{product_id}', [Api\User\CommentController::class, 'store']);
    Route::delete('/{comment}', [Api\User\CommentController::class, 'destroy']);


});
/** Admin Products */
Route::group(['middleware' => ['auth:sanctum', 'admin'], 'prefix' => 'admin/products'], function () {
    Route::get('/', [Api\Admin\ProductController::class, 'index']);
    Route::post('/', [Api\Admin\ProductController::class, 'store']);
    Route::put('/{product}', [Api\Admin\ProductController::class, 'update']);
    Route::delete('/{product}', [Api\Admin\ProductController::class, 'destroy']);

});

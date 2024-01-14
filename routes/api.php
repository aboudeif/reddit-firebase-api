<?php

namespace App\Http\Controllers\V1;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {


    // firebase routes
    Route::get('/', [FirebaseController::class,'getRedditData']);
    
    // reddit routes
    Route::get('/reddit/{subreddit}/{category}', [RedditController::class, 'getPosts']);
    
});
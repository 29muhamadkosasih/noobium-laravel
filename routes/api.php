<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/sign-up', [AuthController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::middleware('auth:api')->group(function () {
    // Route::get('/auth-only', [AuthController::class, function() { return response()->json([ 'data' =>'oy']); }]);
    Route::post('/sign-out', [AuthController::class, 'signOut']);
});

Route::middleware('jwt.refresh')->post('/refresh', [AuthController::class, 'refresh']);

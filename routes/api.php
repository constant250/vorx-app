<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

/**
 * Authenticated Routes
 */
Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    /** Logout route */
    Route::post('logout', [AuthController::class, 'logout']);

    /** Fetch auth user **/
    Route::post('auth/user', [AuthController::class, 'authUser']);

    Route::get('sample', [AuthController::class, 'sampleRoute']);

    // Route::get('check-auth', [AuthController::class, 'checkAuth']);

    /** API Routes */
    // UserController::apiRoutes();
    ProductController::apiRoutes();
    
});

/**
 * Auth Routes
 */
Route::prefix('v1')->group(function () {
    /** Login route */
    Route::post('login', [AuthController::class, 'login']);

    /** Register route */
    Route::post('register', [AuthController::class, 'register']);

    /** Reset Password routes */

    /** Account Registration */
    // AccountController::unguardedRoutes();
});

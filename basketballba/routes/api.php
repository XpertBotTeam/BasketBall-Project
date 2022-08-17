<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketballnewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('teams', TeamController::class);

Route::resource('users', UserController::class);

Route::resource('news', BasketballnewController::class);

Route::resource('admins', AdminController::class);


// Route::group([ 'prefix' => 'auth', 'namespace' => 'User', 'middleware' => 'auth.guard:user_api'
// ], function ($router) {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     Route::get('/user-profile', [AuthController::class, 'userProfile']);    
// });

Route::group([
    
    ['middleware' => 'auth:user_api'],
    'prefix' => 'user',
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AuthController::class, 'userProfile']);
});
Route::group([
    
    ['middleware' => 'auth:admin_api'],
    'prefix' => 'admin',
], function () {
    Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AdminAuthController::class, 'adminProfile']);
});



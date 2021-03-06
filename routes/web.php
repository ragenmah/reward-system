<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/orders', [OrderController::class, 'index'])->name("orders");
Route::get('/neworder', [OrderController::class, 'neworder'])->name("orders");


Route::get('/rewards', [RewardController::class, 'index'])->name("rewards");
Route::post('/rewardusers', [RewardController::class, 'addRewardUsers']);
Route::post('/addrewards', [RewardController::class, 'addRewardPoints']);
Route::post('/postrewards', [RewardController::class, 'postRewards']);

Route::get('/calculation', function () {
    return view('calculation');
});




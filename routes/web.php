<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::prefix("admin")->name("admin.")->group(function(){
        Route::view("/","admin.profile")->name('profile');
        Route::post('/change-profile',[ProfileController::class,'updateProfile'])->name('update-profile');
        Route::post('/update-photo',[ProfileController::class,'updatePhoto'])->name('update-photo');
        Route::post("/change-password",[ProfileController::class,'updatePassword'])->name('change-password');
        Route::post("/update-social",[ProfileController::class,'updateSocial'])->name('social');
        Route::view('/terms','admin.terms' )->name('terms');

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


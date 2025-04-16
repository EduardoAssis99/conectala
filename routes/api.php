<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return response('API ON');
});

Route::post('login', [AuthController::class,'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('users', [UserController::class,'index'])->name('user.index');
    Route::get('user/{user}', [UserController::class,'show'])->name('user.show');
    Route::put('user/update/{user}', [UserController::class,'update'])->name('user.update');
    Route::post('user/store', [UserController::class,'store'])->name('user.store');
    Route::delete('user/{user}', [UserController::class,'delete'])->name('user.destroy');

    Route::get('logout', [AuthController::class,'logout'])->name('logout');

});
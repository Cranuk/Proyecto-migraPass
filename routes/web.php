<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('users/add', [App\Http\Controllers\UserController::class, 'add'])->name('users.add');

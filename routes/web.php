<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
    });

Route::resource('article', ArticleController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;

Route::GET('/', [HomeController::class, 'index'])->name('home.index');
Route::GET('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'auth'], function(){
    Route::GET('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::GET('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::POST('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::group(['prefix' => 'grupos'], function(){
    Route::GET('/', [GrupoController::class, 'index'])->name('grupos.index');
    Route::GET('/cadastro', [GrupoController::class, 'create'])->name('grupos.create');
    Route::POST('/salvarGrupo', [GrupoController::class, 'store'])->name('grupos.store');
});

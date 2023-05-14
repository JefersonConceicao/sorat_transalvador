<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'auth'], function(){
    Route::GET('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::GET('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::POST('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::group(['middleware' => 'auth'], function(){
    Route::GET('/', [HomeController::class, 'index'])->name('home.index');

    Route::group(['prefix' => 'grupos'], function(){
        Route::GET('/', [GrupoController::class, 'index'])->name('grupos.index');
        Route::GET('/cadastro', [GrupoController::class, 'create'])->name('grupos.create');
        Route::POST('/salvarGrupo', [GrupoController::class, 'store'])->name('grupos.store');
        Route::GET('/edit/{grupo}', [GrupoController::class, 'edit'])->name('grupos.edit');
        Route::POST('/update/{grupo}', [GrupoController::class, 'update'])->name('grupos.update');
        Route::GET('/delete/{grupo}', [GrupoController::class, 'destroy'])->name('grupos.delete');
    });

    Route::group(['prefix' => 'usuarios'], function(){
        Route::GET('/', [UserController::class, 'index'])->name('user.index');
        Route::GET('/cadastro', [UserController::class, 'create'])->name('user.create');
        Route::POST('/salvarUsuario', [UserController::class, 'store'])->name('user.store');
        Route::GET('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::POST('/update/{user}', [UserController::class, 'update'])->name('user.update');
        Route::GET('/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
    });

    Route::GET('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

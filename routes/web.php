<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ParametrosController;

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
        Route::GET('/alterar/{grupo}', [GrupoController::class, 'edit'])->name('grupos.edit');
        Route::POST('/update/{grupo}', [GrupoController::class, 'update'])->name('grupos.update');
        Route::GET('/delete/{grupo}', [GrupoController::class, 'destroy'])->name('grupos.delete');
        Route::GET('/associar-menus/{grupo}', [GrupoController::class, 'viewAssociarMenus'])->name('grupos.associarMenus');
        Route::POST('/toggle-associar-grupos/{grupo}', [GrupoController::class, 'toggleAssociarMenuGrupo'])->name('grupos.toggleAssociarMenuGrupo');
    });

    Route::group(['prefix' => 'usuarios'], function(){
        Route::GET('/', [UserController::class, 'index'])->name('user.index');
        Route::GET('/cadastro', [UserController::class, 'create'])->name('user.create');
        Route::POST('/salvarUsuario', [UserController::class, 'store'])->name('user.store');
        Route::GET('/alterar/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::POST('/update/{user}', [UserController::class, 'update'])->name('user.update');
        Route::GET('/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
        Route::POST('/toggleStatus/{user}', [UserController::class, 'toggleStatus'])->name('user.toggleStatus');
    });

    Route::group(['prefix' => 'parametros'], function(){
        Route::GET('/', [ParametrosController::class, 'index'])->name('parametros.index');
        Route::GET('/cadastro', [ParametrosController::class, 'create'])->name('parametros.create');
        Route::POST('/store', [ParametrosController::class, 'store'])->name('parametros.store');
        Route::GET('/alterar/{parametro}', [ParametrosController::class, 'edit'])->name('parametros.edit');
        Route::POST('/update/{parametro}', [ParametrosController::class, 'update'])->name('parametros.update');
        Route::GET('/delete/{parametro}', [ParametrosController::class, 'destroy'])->name('parametros.destroy');
    });

    Route::group(['prefix' => 'menu'], function(){
        Route::GET('/', [MenuController::class, 'index'])->name('menu.index');
        Route::GET('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::POST('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::GET('/edit/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::POST('/update/{menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::GET('/delete/{menu}', [MenuController::class, 'update'])->name('menu.delete');
    });

    Route::GET('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

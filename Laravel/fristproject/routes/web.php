<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ShopsController;
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/test',[TestController::class, 'fristaction'] );
//Route::get('/second',[TestController::class, 'secondaction'] );
//this is the route for the specific controller
Route::resource ('shops', ShopsController::class); 
//resource method will create all the routes for the controller
//Route::get('/shops', [ShopsController::class, 'index'])->name('shops.index');
//Route::get('/shops/create', [ShopsController::class, 'create'])->name('shops.create');
//Route::get('/shops/{id}', [ShopsController::class, 'show'])->name('shops.show');
//Route::post('/shops', [ShopsController::class, 'store'])->name('shops.store');
//Route::get('/shops/{shop}/edit', [ShopsController::class, 'edit'])->name('shops.edit');
//Route::put('/shops/{shop}/update', [ShopsController::class, 'update'])->name('shops.update');
//Route::delete('/shops/{shop}', [ShopsController::class, 'destroy'])->name('shops.destroy');
Route::get('/login', [ShopsController::class, 'login'])->name('shops.login');
Route::post('/login', [ShopsController::class, 'loginstore'])->name('login.post');
Route::get('/Register', [ShopsController::class, 'register'])->name('shops.register');
Route::post('/Register', [ShopsController::class, 'registerstore'])->name("register.post");
Route::get('/dashboard', [ShopsController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [ShopsController::class, 'logout'])->name('logout');
Route::get('/showall', [ShopsController::class, 'showall'])->name('shops.showall');
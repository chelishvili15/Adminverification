<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ContactsController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    
    Route::get('/login', [LoginController::class, 'showLogin'])->withoutMiddleware([Admin::class])->name('ShowLogin');
    Route::post('/signin', [LoginController::class, 'login'])->withoutMiddleware([Admin::class])->name('AdminLogin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('AdminLogout');
    
    // ადმინისტრატორის პანელის მთავარი გვერდი 
    Route::get('/', function () {
        return view('admin.index');
    })->name('AdminMainPage');
    
});

//ადმინისტრატორების დამატება
Route::resource('admins', AdminsController::class);

//საკონტაქტო ინფ გვერდი
Route::resource('contacts', ContactsController::class, ['only' => ['edit','update']]);
//საკ ინფორმაციის შენახვა ქეშში
Route::get('/contacts/cache', [ContactsController::class, 'cache'])->name('contacts.cache');
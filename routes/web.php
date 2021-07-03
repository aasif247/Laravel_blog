<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('website.home');
}) ->name('website');

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/post', function () {
    return view('website.post');
});



// Admin route 

Route::group(['prefix' => 'admin',  'middleware' => ['auth']  ], function()
    {
        /* Route::get('/dashboard', function(){
         return view('admin.dashboard.index');
        }); */

         Route::resource('category', CategoryController::class);
         Route::resource('tag', TagController::class);
         Route::resource('post', PostController::class);

         //Route::get('/category', [CategoryController::class, 'index'])
         //->name('category');   
    });
   
    Route::prefix('/admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard')->middleware('auth');
    });

    Route::prefix('/auth')->group(function(){
        Route::get('/login',[AuthController::class, 'login'])
        ->name('login');
       
        Route::post('/loginpost',[AuthController::class, 'login_post'])
        ->name('loginpost');
       
        Route::get('/register',[AuthController::class, 'register'])
        ->name('register');
       
        Route::post('/registerpost',[AuthController::class, 'register_post'])
        ->name('registerpost');
       
        Route::get('/logout',[AuthController::class, 'logout'])
        ->name('logout');
       });    
      
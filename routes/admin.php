<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

//Guest Route Group
Route::middleware(['guest'])->group(function () {
    // Admin Auth Route
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
    });
});

//Authenticated Admin Route
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



    Route::prefix('/backend/authors')->controller(AuthorController::class)->name('author.')->group(function(){
        Route::get('/','index')->name('index');

        Route::post('/store','store')->name('store');
        Route::put('/update/{id}','update')->name('update');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::delete('delete/{id}','delete')->name('delete');

    });


    Route::prefix('/backend/categories')->controller(CategoryController::class)->name('category.')->group(function(){
        Route::get('/','index')->name('index');

        Route::post('/store','store')->name('store');
        Route::put('/update/{id}','update')->name('update');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::delete('delete/{id}','delete')->name('delete');
        Route::get('/change_status','change_status')->name('change_status');
    });




    Route::prefix('/backend/subcategories')->controller(SubcategoryController::class)->name('subcategory.')->group(function(){
        Route::get('/','index')->name('index');

        Route::post('/store','store')->name('store');
        Route::put('/update/{id}','update')->name('update');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/get-subcategory-by-category','getSubcategory')->name('getSubcategory');
        Route::get('/change_status','change_status')->name('change_status');

    });



    Route::prefix('/backend/posts')->controller(PostController::class)->name('post.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/view','view')->name('view');
        Route::put('/update/{id}','update')->name('update');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/change_status','change_status')->name('change_status');
        Route::get('/change_feature','change_feature')->name('change_feature');
    });


});




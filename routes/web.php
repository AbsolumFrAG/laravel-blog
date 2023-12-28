<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(IndexController::class)->group(function () {
    Route::get('/', IndexController::class)->name('main.index');
    Route::get('/posts/{post}', 'App\Http\Controllers\Main\IndexController@show')->name('show.index');
    Route::get('/lte3', 'App\Http\Controllers\Main\IndexController@lte3')->name('lte3.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'IndexController@create')->name('admin.post.create');
        Route::post('/', 'IndexController@store')->name('admin.post.store');
        Route::get('/{post}', 'IndexController@show')->name('admin.post.show');
        Route::get('/{post}/edit', 'IndexController@edit')->name('admin.post.edit');
        Route::patch('/{post}', 'IndexController@update')->name('admin.post.update');
        Route::delete('/{post}', 'IndexController@delete')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/create', 'IndexController@create')->name('admin.categories.create');
        Route::post('/', 'IndexController@store')->name('admin.categories.store');
        Route::get('/{category}', 'IndexController@show')->name('admin.categories.show');
        Route::get('/{category}/edit', 'IndexController@edit')->name('admin.categories.edit');
        Route::patch('/{category}', 'IndexController@update')->name('admin.categories.update');
        Route::delete('/{category}', 'IndexController@delete')->name('admin.categories.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'IndexController@create')->name('admin.tag.create');
        Route::post('/', 'IndexController@store')->name('admin.tag.store');
        Route::get('/{tag}', 'IndexController@show')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'IndexController@edit')->name('admin.tag.edit');
        Route::patch('/{tag}', 'IndexController@update')->name('admin.tag.update');
        Route::delete('/{tag}', 'IndexController@delete')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix'=>'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'IndexController@create')->name('admin.user.create');
        Route::post('/', 'IndexController@store')->name('admin.user.store');
        Route::get('/{user}', 'IndexController@show')->name('admin.user.show');
        Route::get('/{user}/edit', 'IndexController@edit')->name('admin.user.edit');
        Route::patch('/{user}', 'IndexController@update')->name('admin.user.update');
        Route::delete('/{user}', 'IndexController@delete')->name('admin.user.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

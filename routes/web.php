<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/login/phone', 'Auth\LoginController@phone')->name('login.phone');
Route::post('/login/phone', 'Auth\LoginController@verify');
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/', [TestController::class, 'index'])->name('home');



Route::get('test', function () {
    dd(getenv('APP_AUTHOR'));
//    return view('items.test');
});


Route::resource('items', 'ItemController');

Route::group(
    [
        'prefix'     => 'admin',
        'as'         => 'admin.',
        'namespace'  => 'Admin',
        'middleware' => ['auth', 'can:admin-panel']
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('users', 'UsersController');
        Route::resource('categories', 'Items\CategoryController');
        Route::resource('items', 'Items\ItemsController');
        Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');
    }
);

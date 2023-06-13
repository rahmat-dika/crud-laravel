<?php

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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('/{user}/show', 'UserController@show')->name('users.show');
        Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::patch('/{user}/update', 'UserController@update')->name('users.update');
        Route::delete('/{user}/delete', 'UserController@destroy')->name('users.destroy');
    });
});
// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About"
//     ]);
// });

// Route::get('/blog', function () {
//     return view('blog', [
//         "title" => "Blog"
//     ]);
// });
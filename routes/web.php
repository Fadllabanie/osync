<?php

use Illuminate\Support\Facades\Route;


Auth::routes();


## Application

Route::get('/yy', [App\Http\Controllers\Application\HomeController::class, 'kk'])->name('kk');

Route::get('/', [App\Http\Controllers\Application\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Application\HomeController::class, 'index'])->name('home');
Route::post('/contact-us', [App\Http\Controllers\Application\HomeController::class, 'contact'])->name('home.contact');
Route::post('/news', [App\Http\Controllers\Application\HomeController::class, 'news'])->name('home.news');




Route::get('/create-profile/{code}', function () {
    return view('vCards.create');
});



Route::group(['prefix' => 'client'], function () {
    // Route::middleware('auth')->group(function () {
    require __DIR__ . '/client.php';
    // });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    require __DIR__ . '/admin.php';
});

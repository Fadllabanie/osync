<?php

use Illuminate\Support\Facades\Route;




    Route::get('/', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('admin');
    
    Route::resource('admins', App\Http\Controllers\Dashboard\AdminController::class);
    // Route::resource('user', ClientController::class);
    Route::resource('cities', App\Http\Controllers\Dashboard\CityController::class);
    Route::resource('countries', App\Http\Controllers\Dashboard\CountryController::class);
   
    Route::resource('categories', App\Http\Controllers\Dashboard\CategoryController::class);
    Route::resource('subcategories', App\Http\Controllers\Dashboard\SubcategoryController::class);
    Route::resource('industries', App\Http\Controllers\Dashboard\IndustryController::class);
    Route::resource('faqs', App\Http\Controllers\Dashboard\FaqController::class);
    Route::resource('messages', App\Http\Controllers\Dashboard\MessageController::class)->only(['index','destroy']);
    Route::resource('cards', App\Http\Controllers\Dashboard\CardController::class);
    Route::resource('profiles', App\Http\Controllers\Dashboard\ProfileController::class);

    Route::get('cards/download',[App\Http\Controllers\Dashboard\CardController::class, "download"])->name('cards.download');
    Route::get('profiles/attach/{profile}',[App\Http\Controllers\Dashboard\ProfileController::class, "attach"])->name('profiles.attach');

    Route::get('profiles/upload/excel',[App\Http\Controllers\Dashboard\ProfileController::class, "upload"])->name('profiles.upload');
  
    Route::get('admin', function () {
        return 'admin';
    });

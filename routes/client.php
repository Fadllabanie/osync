<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\ClientController;



Route::get('/start/{token}', [ClientController::class, 'start'])->name('client.start');
Route::post('check-code', [ClientController::class, 'check'])->name('client.check');
Route::post('/create-profile', [ClientController::class, 'updateOrCreate'])->name('home.profile.update');
Route::get('profile', [ClientController::class, 'show'])->name('home.profile.show');
Route::get('profile/{code}', [ClientController::class, 'display'])->name('home.profile.display');


<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Users\HomeController;
use App\Http\Controllers\API\V1\General\GeneralController;
use App\Http\Controllers\API\V1\Users\Auth\AuthController;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Controllers\API\V1\Users\Cards\CardController;
use App\Http\Controllers\API\V1\Users\Contacts\ContactController;
use App\Http\Controllers\API\V1\Users\Profiles\ProfileController;

Route::group(['prefix' => 'v1'], function () {

    Route::post('upload', [GeneralController::class, 'upload']);
    Route::get('cities', [ConstantController::class, 'getCity']);
    Route::get('counties', [ConstantController::class, 'getCountry']);
    Route::get('industries', [ConstantController::class, 'getIndustry']);
    Route::get('faqs', [ConstantController::class, 'getFaq']);
    Route::get('platforms', [ConstantController::class, 'getPlatform']);

    Route::get('now', function () {
        return Carbon::now()->timestamp;
    });

    Route::post('login', [AuthController::class, 'login']);
    //Route::post('login-use-social-media', [AuthController::class, 'loginUseSocialMedia']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('register-use-social-media', [AuthController::class, 'registerUseSocialMedia']);
    Route::post('verify', [AuthController::class, 'check']);
    Route::post('resend-code', [AuthController::class, 'resendCode']);
    Route::post('verify-change-password', [AuthController::class, 'verifyChangePassword']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('forget-password', [AuthController::class, 'forgetPassword']);

    Route::middleware('auth:api')->group(function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::post('change-old-password', [AuthController::class, 'changeOldPassword']);

        Route::post('update-media', [HomeController::class, 'updateMedia']);
        Route::get('tiny-profile', [HomeController::class, 'tinyProfile']);
        Route::post('large-profile', [HomeController::class, 'largeProfile']);
        Route::apiResource('profiles', ProfileController::class)->except('update');
        Route::post('update-profiles', [ProfileController::class, 'update']);
        Route::post('link-profile-to-card', [ProfileController::class, 'linkToCard']);
        Route::post('link-user-to-profile', [ProfileController::class, 'linkToProfile']);
        Route::put('availability-links-profile/{id}', [ProfileController::class, 'availabilityLinks']);
        //Route::post('availability-field', [ProfileController::class, 'availabilityField']);

        Route::apiResource('cards', CardController::class);
        Route::post('scan-card', [CardController::class, 'scanCard']);

        Route::apiResource('contacts', ContactController::class);
        Route::get('recant-added', [ContactController::class, 'recant']);
        Route::post('add-contact', [ContactController::class, 'addContact']);
        Route::post('delete-contact', [ContactController::class, 'deleteContact']);
    });
    Route::post('scan-card-by-guest', [CardController::class, 'scanCardByGuest']);
});

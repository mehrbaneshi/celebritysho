<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Influencer\Controllers\InfluencerController;
use App\Modules\Campaign\Controllers\CampaignController;
use App\Modules\Wallet\Controllers\WalletController;

Route::prefix('v1')->group(function () {

    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
        Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');
    });

    // Influencers
    Route::middleware('auth:sanctum')->prefix('influencers')->group(function () {
        Route::get('/', [InfluencerController::class, 'index']);                 // لیست برای ادمین
        Route::get('me', [InfluencerController::class, 'me']);                  // پروفایل اینفلوئنسر
        Route::put('me', [InfluencerController::class, 'updateProfile']);       // ویرایش پروفایل
        Route::get('me/campaigns', [InfluencerController::class, 'myCampaigns']);
        Route::post('me/campaigns/{campaign}/accept', [InfluencerController::class, 'acceptCampaign']);
        Route::post('me/campaigns/{campaign}/reject', [InfluencerController::class, 'rejectCampaign']);
        Route::post('me/campaigns/{campaign}/insight', [InfluencerController::class, 'uploadInsight']);
    });

    // Campaigns
    Route::middleware('auth:sanctum')->prefix('campaigns')->group(function () {
        Route::get('/', [CampaignController::class, 'index']);
        Route::post('/', [CampaignController::class, 'store']);                 // ایجاد کمپین توسط تبلیغ‌دهنده
        Route::get('{campaign}', [CampaignController::class, 'show']);
        Route::put('{campaign}', [CampaignController::class, 'update']);
        Route::delete('{campaign}', [CampaignController::class, 'destroy']);
        Route::post('{campaign}/assign/{influencer}', [CampaignController::class, 'assignInfluencer']);
    });

    // Wallet
    Route::middleware('auth:sanctum')->prefix('wallet')->group(function () {
        Route::get('me', [WalletController::class, 'showWallet']);
        Route::get('me/transactions', [WalletController::class, 'listTransactions']);
        Route::post('me/withdraw', [WalletController::class, 'requestWithdrawal']);
    });
});


<?php

namespace App\Modules\Wallet\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showWallet(Request $request)
    {
        // TODO: نمایش موجودی کیف پول کاربر (اینفلوئنسر یا تبلیغ‌دهنده)
        return response()->json([
            'balance' => 0,
            'currency' => 'IRT',
        ]);
    }

    public function listTransactions(Request $request)
    {
        // TODO: لیست تراکنش‌های کیف پول
        return response()->json([
            'data' => [],
        ]);
    }

    public function requestWithdrawal(Request $request)
    {
        // TODO: ثبت درخواست تسویه برای اینفلوئنسر
        return response()->json([
            'status' => 'request_registered',
        ], 201);
    }
}


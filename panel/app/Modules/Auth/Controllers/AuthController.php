<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ثبت‌نام؛ فعلاً خیلی ساده
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'mobile'   => 'required|string|max:20|unique:users,mobile',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'mobile'   => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'status' => 'ok',
            'user'   => $user,
        ], 201);
    }

    // لاگین ساده با موبایل + پسورد
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mobile'   => 'required|string',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt(['mobile' => $credentials['mobile'], 'password' => $credentials['password']])) {
            throw ValidationException::withMessages([
                'mobile' => ['شماره موبایل یا رمز عبور نادرست است.'],
            ]);
        }

        $user = $request->user();

        // TODO: اگر Sanctum نصب شد، اینجا token بساز
        return response()->json([
            'status' => 'ok',
            'user'   => $user,
            'token'  => 'TODO_ADD_TOKEN_HERE',
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'user'   => $request->user(),
        ]);
    }

    public function logout(Request $request)
    {
        // TODO: اگر از token استفاده شد، اینجا revoke کن
        return response()->json([
            'status' => 'ok',
            'message' => 'خروج انجام شد',
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $password = md5($credentials['password']);
        $user = User::where('phone', $credentials['phone'])
            ->where('password', $password)
            ->first();
        if (!$user) {
            return $this->reponseJson([], 'Số điện thoại hoặc mật khẩu không đúng', 400);
        }
        // create session token
        $user->token = Hash::make($credentials['password'] . 'Zxcv!1234');
        \session()->put('token', $user->token);
        return $this->reponseJson(['token' => $user], 'Đăng nhập thành công');
    }
}

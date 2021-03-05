<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Traits\Responser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Responser;

    public function index(UserLoginRequest $userLoginRequest)
    {
        if (Auth::guard('web')->attempt(['email' => $userLoginRequest->email, 'password' => $userLoginRequest->password])) {
            return $this->successResponse('Login Successful', [
                'token' => Auth::guard('web')->user()->createToken('login')->accessToken
            ]);
        } else {
            return $this->errorResponse('Login Unsuccessful');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Responser;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use Responser;

    public function index()
    {
        Auth::guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return $this->successResponse([
            'logout-status' => 'successful'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Traits\Responser;

class RegisterController extends Controller
{
    use Responser;

    private $userModel;

    public function __construct()
    {
        $this->userModel = app(UserRepositoryInterface::class);
    }

    public function index(UserRegistrationRequest $userRegistrationRequest)
    {
        $this->userModel->create([
            'name' => $userRegistrationRequest->name,
            'email' => $userRegistrationRequest->email,
            'password' => bcrypt($userRegistrationRequest->password)
        ]);

        return $this->successResponse('Register Successful');
    }
}

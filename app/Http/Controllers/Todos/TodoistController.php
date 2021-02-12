<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use App\Traits\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoistController extends Controller
{
    use Responser;

    private $todoistRepository, $todoistTitleController;

    public function __construct()
    {
        $this->todoistRepository = app(TodoistRepositoryInterface::class);
        $this->todoistTitleController = app(TodoistTitleRepositoryInterface::class);
    }

    public function index()
    {
        return $this->successResponse('Success',[
            'todoists' => $this->todoistRepository->getByAttributes(['user_id' => Auth::id()]),
            'todoists_title' => $this->todoistTitleController->getByAttributes(['user_id' => Auth::id()]),
        ]);
    }
}

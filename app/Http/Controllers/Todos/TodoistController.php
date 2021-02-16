<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todos\GetTodoistRequest;
use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use App\Traits\Responser;
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
        return $this->successResponse('Success', [
            'todoists_title' => $this->todoistTitleController->getByAttributes(['user_id' => Auth::id()]),
        ]);
    }

    public function getTodoist(GetTodoistRequest $request)
    {
        return $this->successResponse('Success', [
            'todoists_title' => $this->todoistTitleController->getAttributesData(
                [
                    'user_id' => Auth::id(),
                    'title_id' => $request->id
                ],
                ['title', 'description']
            ),
            'todoists' => $this->todoistRepository->getByAttributes([
                'user_id' => Auth::id(),
                'title_id' => $request->id
            ]),
        ]);
    }
}

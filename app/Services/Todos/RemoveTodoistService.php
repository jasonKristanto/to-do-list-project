<?php

namespace App\Services\Todos;

use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RemoveTodoistService
{
    private $todoistRepository, $todoistTitleController, $whereClause;

    public function __construct($deletedTodoistIdRequest)
    {
        $this->todoistRepository = app(TodoistRepositoryInterface::class);
        $this->todoistTitleController = app(TodoistTitleRepositoryInterface::class);
        $this->whereClause = [
            'user_id' => Auth::id(),
            'title_id' => $deletedTodoistIdRequest
        ];
    }

    public function process()
    {
        $this->todoistRepository->destroyByAttributes($this->whereClause);
        $this->todoistTitleController->destroyByAttributes($this->whereClause);
    }
}

<?php

namespace App\Services\Todos;

use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;

class UpdateTodoistService
{
    private $todolistRepository, $todolistTitleRepository, $updateRequestData;

    public function __construct($updateRequestData)
    {
        $this->todolistRepository = app(TodoistRepositoryInterface::class);
        $this->todolistTitleRepository = app(TodoistTitleRepositoryInterface::class);
        $this->updateRequestData = $updateRequestData;
    }

    public function process()
    {
        return $this->updateRequestData;
    }
}

<?php

namespace App\Services\Todos;

use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class GetTodoistService
{
    private $todolistRepository, $titleId;

    public function __construct($titleId)
    {
        $this->todolistRepository = app(TodoistRepositoryInterface::class);
        $this->titleId = $titleId;
    }

    public function process()
    {
        return $this->todolistRepository->getAttributesData(
            ['user_id' => Auth::id(), 'title_id' => $this->titleId],
            ['title_id', 'todos', 'status']
        );
    }
}

<?php

namespace App\Services\Todos;

use App\Helpers\FormatHelpers;
use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CreateNewTodoistService
{
    private $todolistRepository, $todolistTitleRepository, $createRequestData, $newTodolistTitleId;

    public function __construct($createRequestData)
    {
        $this->todolistRepository = app(TodoistRepositoryInterface::class);
        $this->todolistTitleRepository = app(TodoistTitleRepositoryInterface::class);
        $this->createRequestData = $createRequestData;
    }

    public function process()
    {
        $this->createTodolistTitle();
        $this->createTodoists();
    }

    private function createTodolistTitle()
    {
        $this->newTodolistTitleId = $this->todolistTitleRepository->createAndGetId([
            'user_id' => Auth::id(),
            'title' => $this->createRequestData['todoistTitle'],
            'description' => $this->createRequestData['todoistDesc'],
        ], 'title_id');
    }

    private function createTodoists()
    {
        if (!empty($this->createRequestData['todoists'])) {
            foreach ($this->createRequestData['todoists'] as $todoist) {
                $this->todolistRepository->create([
                    'user_id' => Auth::id(),
                    'title_id' => $this->newTodolistTitleId,
                    'todos' => $todoist['todos'],
                    'status' => FormatHelpers::formattingBoolean($todoist['status']),
                ]);
            }
        }
    }
}

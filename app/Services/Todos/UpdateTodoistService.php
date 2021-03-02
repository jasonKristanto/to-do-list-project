<?php

namespace App\Services\Todos;

use App\Helpers\FormatHelpers;
use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
        $this->updateTodolistTitle();
        $this->updateTodoists();
        $this->removeTodoists();
    }

    private function updateTodolistTitle()
    {
        $todolistTitle = $this->todolistTitleRepository->find($this->updateRequestData['todoistId']);

        $this->todolistTitleRepository->update($todolistTitle, [
            'title' => $this->updateRequestData['todoistTitle'],
            'description' => $this->updateRequestData['todoistDesc'],
        ]);
    }

    private function updateTodoists()
    {
        if (!empty($this->updateRequestData['todoists'])) {
            foreach ($this->updateRequestData['todoists'] as $todoist) {
                if (!empty($todoist['info']) && $todoist['info'] == 'new todos') {
                    $this->todolistRepository->create([
                        'user_id' => Auth::id(),
                        'title_id' => $this->updateRequestData['todoistId'],
                        'todos' => $todoist['todos'],
                        'status' => FormatHelpers::formattingBoolean($todoist['status']),
                    ]);
                } else {
                    $todolist = $this->todolistRepository->find($todoist['id']);
                    $this->todolistRepository->update($todolist, [
                        'todos' => $todoist['todos'],
                        'status' => FormatHelpers::formattingBoolean($todoist['status']),
                    ]);
                }
            }
        }
    }

    private function removeTodoists()
    {
        if (!empty($this->updateRequestData['removedTodoists'])) {
            foreach ($this->updateRequestData['removedTodoists'] as $todoist) {
                $this->todolistRepository->destroyByAttributes([
                    'id' => $todoist['id'],
                    'user_id' => Auth::id(),
                    'title_id' => $this->updateRequestData['todoistId'],
                ]);
            }
        }
    }
}

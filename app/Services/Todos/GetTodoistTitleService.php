<?php

namespace App\Services\Todos;

use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class GetTodoistTitleService
{
    private $todolistTitleRepository, $whereClause;

    public function __construct($titleId = null)
    {
        $this->todolistTitleRepository = app(TodoistTitleRepositoryInterface::class);
        $this->whereClause = [
            'user_id' => Auth::id()
        ];

        if (!is_null($titleId)) {
            $this->whereClause['title_id'] = $titleId;
        }
    }

    public function process()
    {
        return $this->todolistTitleRepository->getAttributesData($this->whereClause,
            ['title_id', 'title', 'description']
        );
    }
}

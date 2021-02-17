<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todos\TodoistIdRequest;
use App\Http\Requests\Todos\UpdateTodoistRequest;
use App\Services\Todos\GetTodoistService;
use App\Services\Todos\GetTodoistTitleService;
use App\Services\Todos\RemoveTodoistService;
use App\Services\Todos\UpdateTodoistService;
use App\Traits\Responser;

class TodoistController extends Controller
{
    use Responser;

    public function index()
    {
        return $this->successResponse('Success', (new GetTodoistTitleService())->process());
    }

    public function getTodoist(TodoistIdRequest $request)
    {
        return $this->successResponse('Success', [
            'todoists_title' => (new GetTodoistTitleService($request->id))->process(),
            'todoists' => (new GetTodoistService($request->id))->process(),
        ]);
    }

    public function update(UpdateTodoistRequest $request)
    {
        return $this->successResponse('Success', (new UpdateTodoistService($request->validated()))->process());
    }

    public function delete(TodoistIdRequest $request)
    {
        return $this->successResponse('Success', (new RemoveTodoistService($request->validated()))->process());
    }
}

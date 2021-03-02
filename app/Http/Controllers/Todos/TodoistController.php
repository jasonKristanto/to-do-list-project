<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todos\CreateNewTodoistRequest;
use App\Http\Requests\Todos\TodoistIdRequest;
use App\Http\Requests\Todos\UpdateTodoistRequest;
use App\Services\Todos\CreateNewTodoistService;
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

    public function store(CreateNewTodoistRequest $request)
    {
        $createNewTodoistService = new CreateNewTodoistService($request->validated());
        $createNewTodoistService->process();

        return $this->successResponse();
    }

    public function update(UpdateTodoistRequest $request)
    {
        $updateTodoistService = new UpdateTodoistService($request->validated());
        $updateTodoistService->process();

        return $this->successResponse();
    }

    public function delete(TodoistIdRequest $request)
    {
        $removeTodoistService = new RemoveTodoistService($request->validated());
        $removeTodoistService->process();

        return $this->successResponse();
    }
}

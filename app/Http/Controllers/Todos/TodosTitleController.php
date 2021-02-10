<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Repositories\Todos\Lists\TodoListRepositoryInterface;
use App\Repositories\Todos\Title\TodolistTitleRepositoryInterface;
use App\Traits\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosTitleController extends Controller
{
    use Responser;

    private $repository;

    public function __construct()
    {
        $this->repository = app(TodoListRepositoryInterface::class);
    }

    public function index()
    {
        return $this->successResponse('Success',
            $this->repository->getByAttributes(['user_id' => Auth::id()])
        );
    }
}

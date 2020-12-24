<?php

namespace App\Http\Controllers\Todos;

use App\Http\Controllers\Controller;
use App\Repositories\Todos\Title\TodolistTitleRepositoryInterface;
use App\Traits\Responser;
use Illuminate\Http\Request;

class TodosTitleController extends Controller
{
    use Responser;

    private $todosTitleModel;

    public function __construct()
    {
        $this->todosTitleModel = app(TodolistTitleRepositoryInterface::class);
    }

    public function index()
    {
        return $this->successResponse(
            $this->todosTitleModel->find(1)
        );
    }
}

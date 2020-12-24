<?php

namespace App\Providers;

use App\Models\Todolist;
use App\Models\TodolistTitle;
use App\Models\User;
use App\Repositories\Todos\Lists\TodoListRepository;
use App\Repositories\Todos\Lists\TodoListRepositoryInterface;
use App\Repositories\Todos\Title\TodolistTitleRepository;
use App\Repositories\Todos\Title\TodolistTitleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserRepository();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerUserRepository()
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserRepository(new User());
        });

        $this->app->bind(TodolistTitleRepositoryInterface::class, function () {
            return new TodolistTitleRepository(new TodolistTitle());
        });

        $this->app->bind(TodoListRepositoryInterface::class, function () {
            return new TodoListRepository(new Todolist());
        });
    }
}

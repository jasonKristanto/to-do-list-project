<?php

namespace App\Providers;

use App\Models\Todolist;
use App\Models\TodolistTitle;
use App\Models\User;
use App\Repositories\Todos\Lists\TodoistRepository;
use App\Repositories\Todos\Lists\TodoistRepositoryInterface;
use App\Repositories\Todos\Title\TodoistTitleRepository;
use App\Repositories\Todos\Title\TodoistTitleRepositoryInterface;
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

        $this->app->bind(TodoistTitleRepositoryInterface::class, function () {
            return new TodoistTitleRepository(new TodolistTitle());
        });

        $this->app->bind(TodoistRepositoryInterface::class, function () {
            return new TodoistRepository(new Todolist());
        });
    }
}

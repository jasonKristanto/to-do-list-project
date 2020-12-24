<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->get();
    }

    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function update($model, $data)
    {
        $model->update($data);
        return $model;
    }

    public function updateOrCreate($attributes, $data)
    {
        return $this->model->updateOrCreate($attributes, $data);
    }

    public function destroy($model)
    {
        return $model->delete();
    }
}

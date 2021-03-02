<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function find($id);

    public function all();

    public function paginate($perPage = 15);

    public function create($data);

    public function insert($data);

    public function update($model, $data);

    public function updateOrCreate($attributes, $data);

    public function destroy($model);
}

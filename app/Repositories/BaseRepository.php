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

    public function createAndGetId($data, $id)
    {
        return $this->model->create($data)->$id;
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

    public function getAttributesData(array $where, array $attributes = [])
    {
        return $this->model->where($where)->get($attributes);
    }

    public function findByAttributes(array $attributes)
    {
        $query = $this->buildQueryByAttributes($attributes);
        return $query->first();
    }

    public function getByAttributes(array $attributes)
    {
        $query = $this->buildQueryByAttributes($attributes);
        return $query->get();
    }

    public function findMany(array $ids)
    {
        $query = $this->model->query();
        return $query->whereIn('id', $ids)->get();
    }

    public function updateByAttributes(array $attributes, array $data)
    {
        return $this->buildQueryByAttributes($attributes)->limit(1)->update($data);
    }

    public function updateManyByAttributes(array $attributes, array $data)
    {
        return $this->buildQueryByAttributes($attributes)->update($data);
    }

    public function destroyByAttributes(array $attributes)
    {
        return $this->buildQueryByAttributes($attributes)->delete();
    }

    public function clearCache()
    {
        return true;
    }

    public function buildQueryByAttributes(array $attributes, $orderBy = null, $sortOrder = 'desc')
    {
        $query = $this->model->query();

        foreach ($attributes as $field => $value) {
            $query = $query->where($field, $value);
        }

        if (null !== $orderBy) {
            $query->orderBy($orderBy, $sortOrder);
        }

        return $query;
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ? Model
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($id): ? bool
    {
        $record = $this->model->find($id);
        return $record->delete();
    }

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->model->getFillable();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all()->sortByDesc('id');
    }

    /**
     * @param $id
     * @param array $attributes
     * @return Model
     */
    public function update($id, array $attributes)
    {
        $record = $this->model->find($id);
        return $record->update($attributes);
    }
}








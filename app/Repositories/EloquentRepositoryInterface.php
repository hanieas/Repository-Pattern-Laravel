<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes):Model;

    /**
     * @param $id
     * @return Model|null
     */
    public function find($id): ? Model;

    /**
     * @param $id
     * @return bool|null
     */
    public function destroy($id): ? bool;

    /**
     * @return Model
     */
    public function all(): Collection;

    /**
     * @param $id
     * @param array $attributes
     * @return Model
     */
    public function update($id , array $attributes);

}

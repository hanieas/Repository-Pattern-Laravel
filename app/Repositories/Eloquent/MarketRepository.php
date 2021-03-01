<?php

namespace App\Repositories\Eloquent;

use App\Models\Market;
use App\Models\Product;
use App\Repositories\MarketRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MarketRepository extends BaseRepository implements MarketRepositoryInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * MarketRepository constructor.
     * @param Market $model
     */
    public function __construct(Market $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function hasProduct(): Collection
    {
        return $this->model->whereHas('products')->get()->sortByDesc('id');
    }


}

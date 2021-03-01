<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface MarketRepositoryInterface
{
    public function hasProduct(): Collection;

}

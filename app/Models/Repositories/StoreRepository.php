<?php

namespace App\Models\Repositories;

use App\Models\Store;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @extends BaseModelRepository<Store>
 */
class StoreRepository extends BaseModelRepository
{
    protected function query(): Builder
    {
        return Store::query();
    }
}

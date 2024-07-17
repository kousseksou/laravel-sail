<?php

namespace App\Models\Contracts;

use App\Models\Repositories\Criteria\Criteria;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @template TModel of Model
 */
interface Collection
{
    /**
     * @return TModel[]
     */
    public function all(): iterable;

    /**
     * @return Collection<TModel>
     */
    public function search(Criteria ...$criteria): Collection;

    public function paginate(int $perPage, int $page): Arrayable;
}

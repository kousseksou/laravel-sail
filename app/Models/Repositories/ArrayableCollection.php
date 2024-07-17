<?php

namespace App\Models\Repositories;

use App\Models\Contracts\Collection;
use App\Models\Contracts\Model;
use App\Models\Repositories\Criteria\Criteria;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @template TModel of Model
 */
readonly class ArrayableCollection implements Arrayable, Collection
{
    public function __construct(private Builder $builder) {}

    /**
     * @return TModel[]
     */
    public function all(): iterable
    {
        return $this->builder->get();
    }

    /**
     * @return Collection<TModel>
     */
    public function search(Criteria ...$criteria): Collection
    {
        $query = $this->builder;
        foreach ($criteria as $criterion) {
            $query = $criterion->apply($query);
        }

        return new self($query);
    }

    public function paginate(int $perPage, int $page): Arrayable
    {
        return $this->builder->paginate(perPage: $perPage, page: $page);
    }

    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}

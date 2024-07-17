<?php

namespace App\Models\Repositories;

use App\Models\Attributes\Identifier;
use App\Models\Attributes\ModelAttribute;
use App\Models\Contracts\Collection;
use App\Models\Contracts\Model;
use App\Models\Contracts\Repository;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @template TModel of Model
 */
abstract class BaseModelRepository implements Repository
{
    public function find(Identifier $id): ?Model
    {
        return $this->query()->find($id->value());
    }

    public function findOrFail(Identifier $id): Model
    {
        return $this->query()->findOrFail($id->value());
    }

    /**
     * @return ?TModel
     */
    public function findOneByAttribute(ModelAttribute ...$attributes): ?Model
    {
        $results = $this->withAttributes(...$attributes)->get();

        if ($results->count() > 1) {
            throw new \LogicException('More than one result is found. Expected exactly one.');
        }

        return $results->first();
    }

    /**
     * @return Collection<TModel>
     */
    public function findByAttribute(ModelAttribute ...$attributes): Collection
    {
        return new ArrayableCollection($this->withAttributes(...$attributes));
    }

    public function paginate(int $perPage, int $page, ModelAttribute ...$attributes): Arrayable
    {
        return $this->withAttributes()->paginate(perPage: $perPage, page: $page);
    }

    /**
     * @return Builder<TModel>
     */
    abstract protected function query(): Builder;

    private function withAttributes(ModelAttribute ...$attributes): Builder
    {
        $query = $this->query();

        foreach ($attributes as $attribute) {
            $query->where($attribute->name(), $attribute->value());
        }

        return $query;
    }
}

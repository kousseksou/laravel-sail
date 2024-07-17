<?php

namespace App\Models\Repositories\Criteria;

use App\Models\Attributes\ModelAttribute;
use Illuminate\Contracts\Database\Eloquent\Builder;

class OrWhereAttributeLikeCriteria implements Criteria
{
    /**
     * @var ModelAttribute[]
     */
    private array $attributes;

    public function __construct(ModelAttribute ...$attributes)
    {
        $this->attributes = $attributes;
    }

    public function apply(Builder $builder): Builder
    {
        return $builder->where(function (Builder $query) {
            foreach ($this->attributes as $attribute) {
                if (empty($attribute->value())) {
                    continue;
                }
                $query->orWhere($attribute->name(), 'LIKE', '%'.$attribute->value().'%');
            }
        });
    }
}

<?php

namespace App\Models\Repositories\Criteria;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface Criteria
{
    public function apply(Builder $builder): Builder;
}

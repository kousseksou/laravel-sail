<?php

namespace App\Models\Contracts;

use App\Models\Attributes\Identifier;
use App\Models\Attributes\ModelAttribute;
use Illuminate\Contracts\Support\Arrayable;

interface Repository
{
    public function find(Identifier $id): ?Model;

    public function findOrFail(Identifier $id): Model;

    public function findOneByAttribute(ModelAttribute ...$attributes): ?Model;

    public function findByAttribute(ModelAttribute ...$attributes): Collection;

    public function paginate(int $perPage, int $page, ModelAttribute ...$attributes): Arrayable;
}

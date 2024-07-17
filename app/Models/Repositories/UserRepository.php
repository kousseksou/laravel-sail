<?php

namespace App\Models\Repositories;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @extends BaseModelRepository<User>
 */
class UserRepository extends BaseModelRepository
{
    protected function query(): Builder
    {
        return User::query();
    }
}

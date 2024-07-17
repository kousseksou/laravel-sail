<?php

namespace App\Models\Repositories;

use App\Models\Book;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @extends BaseModelRepository<Book>
 */
class BookRepository extends BaseModelRepository
{
    protected function query(): Builder
    {
        return Book::query();
    }
}

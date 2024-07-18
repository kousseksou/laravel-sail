<?php

namespace App\States;

use App\Models\BaseModel;
use App\Models\Book;

class BookProcessor extends BaseModelProcessor
{
    public function create(array $attributes): BaseModel
    {
        $record = new Book($attributes);
        $record->save();

        return $record;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Repositories\BookRepository;
use App\States\BookProcessor;

class BookController extends ResourceController
{
    public function __construct(BookRepository $repository, BookProcessor $processor)
    {
        parent::__construct($repository, $processor);
    }

    protected function validationRules(): array
    {
        return [
            'name' => ['string', 'required'],
            'reference' => ['string', 'required'],
            'store_id' => ['integer', 'required', 'exists:stores,id'],
        ];
    }
}

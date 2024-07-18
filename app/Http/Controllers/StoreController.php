<?php

namespace App\Http\Controllers;

use App\Models\Repositories\BaseModelRepository;
use App\Models\Repositories\StoreRepository;
use App\States\BaseModelProcessor;
use App\States\StoreProcessor;

class StoreController extends ResourceController
{
    public function __construct(StoreRepository $repository, StoreProcessor $processor)
    {
        parent::__construct($repository, $processor);
    }

    protected function validationRules(): array
    {
        return [
            'name' => ['string', 'required'],
            'city' => ['string', 'required'],
        ];
    }
}

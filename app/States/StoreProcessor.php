<?php

namespace App\States;

use App\Models\BaseModel;
use App\Models\Store;

class StoreProcessor extends BaseModelProcessor
{
    public function create(array $attributes): BaseModel
    {
        $record = new Store($attributes);
        $record->save();

        return $record;
    }
}

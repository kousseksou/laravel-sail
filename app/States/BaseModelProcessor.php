<?php

namespace App\States;

use App\Models\BaseModel;

abstract class BaseModelProcessor
{
    abstract public function create(array $attributes): BaseModel;

    public function update(BaseModel $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    public function destroy(BaseModel $model): ?bool
    {
        return $model->delete();
    }
}

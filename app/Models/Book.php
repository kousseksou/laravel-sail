<?php

namespace App\Models;

use App\Models\Contracts\Model;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends BaseModel implements Model
{
    protected $fillable = [
        'name',
        'reference',
        'store_id',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends BaseModel
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

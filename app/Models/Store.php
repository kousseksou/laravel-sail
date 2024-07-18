<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends BaseModel
{
    protected $fillable = [
        'name',
        'city',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}

<?php

namespace App\Models;

use App\Models\Contracts\Model;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends BaseModel implements Model
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

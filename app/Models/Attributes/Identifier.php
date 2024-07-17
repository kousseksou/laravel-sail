<?php

namespace App\Models\Attributes;

final readonly class Identifier implements ModelAttribute
{
    public function __construct(private mixed $identifier) {}

    public function name(): string
    {
        return 'id';
    }

    public function value(): mixed
    {
        return $this->identifier;
    }
}

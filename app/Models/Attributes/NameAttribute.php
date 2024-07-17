<?php

namespace App\Models\Attributes;

final readonly class NameAttribute implements ModelAttribute
{
    public function __construct(private ?string $name) {}

    public function name(): string
    {
        return 'name';
    }

    public function value(): ?string
    {
        return $this->name;
    }
}

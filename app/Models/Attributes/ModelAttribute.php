<?php

namespace App\Models\Attributes;

interface ModelAttribute
{
    public function name(): string;

    public function value(): mixed;
}

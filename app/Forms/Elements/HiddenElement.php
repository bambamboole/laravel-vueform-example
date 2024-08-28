<?php declare(strict_types=1);

namespace App\Forms\Elements;

class HiddenElement extends FormElement
{
    public function __construct(
        public readonly string $name,
        public readonly mixed $value,
        public readonly bool $meta = false,
    ) {}
}

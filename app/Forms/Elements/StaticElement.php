<?php declare(strict_types=1);

namespace App\Forms\Elements;

class StaticElement extends FormElement
{
    public function __construct(
        public string $name,
        public readonly string|array $content,
        public readonly ?string $tag = null,
        public readonly ?array $conditions = null,
    ) {}
}

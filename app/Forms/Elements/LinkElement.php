<?php declare(strict_types=1);

namespace App\Forms\Elements;

class LinkElement extends FormElement
{
    public function __construct(
        public string $name,
        public readonly string $href,
        public readonly string $content,
        public readonly string $method = 'get',
        public readonly ?array $conditions = null,
    ) {
    }
}

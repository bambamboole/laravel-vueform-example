<?php declare(strict_types=1);

namespace App\Forms\Elements;

class TextElement extends FormElement
{
    public function __construct(
        public readonly string $name,
        public readonly mixed $value = null,
        public readonly ?string $label = null,
        public readonly ?string $placeholder = null,
        public readonly array $attrs = [],
    ) {}

    public function jsonSerialize(): mixed
    {
        return array_merge(
            parent::jsonSerialize(),
            ['label' => $this->label === null ? ucfirst($this->name) : $this->label],
        );
    }
}

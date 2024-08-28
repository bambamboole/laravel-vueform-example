<?php declare(strict_types=1);

namespace App\Forms\Elements;

class ButtonElement extends FormElement
{
    public function __construct(
        public readonly string $name,
        public readonly string $buttonLabel = 'Submit',
        public readonly string $buttonType = 'button',
        public readonly ?string $href = null,
        public readonly bool $submits = true,
        public readonly array $removeClass = ['button_enabled' => ['hover:scale-105']],
    ) {}
}

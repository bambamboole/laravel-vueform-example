<?php declare(strict_types=1);

namespace App\Forms\Elements;

use App\Forms\Schema;

class GroupElement extends FormElement
{
    public function __construct(
        public readonly string $name,
        public readonly Schema $schema,
        public readonly ?array $conditions = null,
    ) {}
}

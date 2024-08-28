<?php declare(strict_types=1);

namespace App\Forms;

class Form implements \JsonSerializable
{
    public function __construct(
        public readonly string $endpoint,
        public readonly Schema $schema,
        public readonly string $method = 'POST',
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'endpoint' => $this->endpoint,
            'method' => $this->method,
            'size' => 'md',
            'displayErrors' => false,
            'schema' => $this->schema,
        ];
    }
}

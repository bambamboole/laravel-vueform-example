<?php declare(strict_types=1);

namespace App\Forms;

use App\Forms\Elements\FormElement;

class Schema implements \JsonSerializable
{
    public function __construct(private array $elements) {}

    public function addAfter(string $name, FormElement $newElement)
    {
        $newElements = [];
        foreach ($this->elements as $element) {
            $newElements[] = $element;
            if ($element->name === $name) {
                $newElements[$element->name] = $newElement;
            }
        }
        $this->elements = $newElements;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this->elements as $element) {
            $data[$element->name] = $element;
        }

        return $data;
    }
}

<?php declare(strict_types=1);

namespace App\Forms\Elements;

use Illuminate\Support\Str;

abstract class FormElement implements \JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return array_filter(
            array_merge(
                get_object_vars($this),
                [
                    'type' => Str::of(get_class($this))->afterLast('\\')->remove('Element')->lower(),
                ],
            )
        );
    }
}

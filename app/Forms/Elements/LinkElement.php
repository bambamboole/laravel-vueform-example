<?php declare(strict_types=1);

namespace App\Forms\Elements;

class LinkElement extends StaticElement
{
    public function __construct(
        public string $name,
        public readonly string $href,
        public readonly string $text,
        public readonly string $method = 'get',
    ) {
        parent::__construct($name, ['template' => sprintf('<Link href="%s" v-html="\'%s\'" method="%s"/>', $href, $text, $method)]);
    }
}

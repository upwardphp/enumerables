<?php

namespace Upward\Enumerables\Attributes;

use Attribute;

#[Attribute]
class Label
{
    public function __construct(
        protected null | string $text = null,
        protected readonly bool $translate = true,
    )
    {
    }

    public function text(string $value): static
    {
        $this->text = $value;
        return $this;
    }

    public function __toString(): string
    {
        return $this->translate ? trans($this->text) : $this->text;
    }
}

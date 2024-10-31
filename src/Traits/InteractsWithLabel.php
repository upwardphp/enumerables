<?php

namespace Upward\Enumerables\Traits;

use Upward\Enumerables\Resolvers\LabelResolver;

trait InteractsWithLabel
{
    public function getLabel(): string
    {
        return LabelResolver::shouldReturnText(
            enumerable: $this,
        );
    }
}

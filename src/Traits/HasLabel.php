<?php

namespace Upward\Enumerables\Traits;

use Upward\Enumerables\Exceptions\MissingLabelAttributeException;
use Upward\Enumerables\Resolvers\LabelResolver;

trait HasLabel
{
    /**
     * @throws MissingLabelAttributeException
     */
    public function getLabel(): string
    {
        return LabelResolver::shouldReturnText(
            enumerable: $this,
        );
    }
}

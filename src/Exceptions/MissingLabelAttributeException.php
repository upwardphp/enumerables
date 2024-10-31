<?php

namespace Upward\Enumerables\Exceptions;

use Exception;
use UnitEnum;
use Upward\Enumerables\Attributes\Label;

class MissingLabelAttributeException extends Exception
{
    public static function make(UnitEnum $enum): MissingLabelAttributeException
    {
        return new MissingLabelAttributeException(
            message: sprintf(
                'Enum case \'%s\' in class [%s] is missing required [%s] attribute',
                $enum->name,
                $enum::class,
                Label::class,
            ),
        );
    }
}

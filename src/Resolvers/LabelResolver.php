<?php

namespace Upward\Enumerables\Resolvers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ReflectionAttribute;
use ReflectionEnumUnitCase;
use UnitEnum;
use Upward\Enumerables\Attributes\Label;
use Upward\Enumerables\Exceptions\MissingLabelAttributeException;

class LabelResolver
{
    /**
     * @throws MissingLabelAttributeException
     */
    public static function shouldReturnText(UnitEnum $enumerable): string
    {
        $enum = new ReflectionEnumUnitCase(
            class: $enumerable::class,
            constant: $enumerable->name,
        );

        /** @var ReflectionAttribute|null $attribute */
        $attribute = Arr::first($enum->getAttributes(name: Label::class));

        if (!$attribute) {
            throw MissingLabelAttributeException::make(
                enum: $enumerable,
            );
        }

        return (string) $attribute->newInstance()->text(
            data_get(target: $attribute->getArguments(), key: 'text') ?: Str::headline(value: $enumerable->name)
        );
    }
}

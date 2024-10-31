<?php

use Illuminate\Support\Facades\Lang;
use Upward\Enumerables\Exceptions\MissingLabelAttributeException;
use Upward\Tests\Attributes\TestCase;
use Upward\Tests\LabelEnum;

uses(TestCase::class);

it('should be able to return the same text as the case name for the First case', function (): void {
    $enum = LabelEnum::First;

    expect(value: $enum->name)
        ->toBe($enum->getLabel());
});

it('should be able to return the translated text for the First case', function (): void {
    $enum = LabelEnum::First;

    Lang::shouldReceive('get')
        ->once()
        ->andReturn('Primeiro');

    expect(value: $enum->getLabel())
        ->not
        ->toBe(expected: $enum->name);
});

it('should be able to return a different text for the Second case', function (): void {
    $enum = LabelEnum::Second;

    expect(value: $enum->getLabel())
        ->toBe(expected: 'Another text');
});

it('should be able to throw an exception when the Label Attribute is not present', function (): void {
    $enum = LabelEnum::Third;

    expect(
        value: fn () => $enum->getLabel(),
    )->toThrow(
        exception: MissingLabelAttributeException::class,
    );
});

it('should not be able return a translated text', function () {
    $enum = LabelEnum::Fourth;

    Lang::shouldReceive('get')
        ->andReturn('Quarto');

    expect(
        value: $enum->getLabel(),
    )->toBe(
        expected: 'Fourth',
    );
});

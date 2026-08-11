<?php

declare(strict_types=1);

use DataLens\DataLens\DataLens;

it('resolves the singleton', function () {
    expect(app(DataLens::class))->toBeInstanceOf(DataLens::class);
});

it('returns the same instance from the container', function () {
    expect(app(DataLens::class))->toBe(app(DataLens::class));
});

it('merges the package config', function () {
    expect(config('datalens.placeholder'))->toBe('default');
});

it('loads the package translations', function () {
    expect(trans('datalens::messages.placeholder'))->toBe('DataLens placeholder translation.');
});

it('loads the package views', function () {
    expect(view()->exists('datalens::placeholder'))->toBeTrue();
});

it('registers the artisan command', function () {
    $this->artisan('datalens:placeholder')
        ->expectsOutputToContain('DataLens placeholder command executed.')
        ->assertSuccessful();
});

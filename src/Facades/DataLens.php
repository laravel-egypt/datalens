<?php

declare(strict_types=1);

namespace DataLens\DataLens\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DataLens\DataLens\DataLens
 */
class DataLens extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \DataLens\DataLens\DataLens::class;
    }
}

<?php

declare(strict_types=1);

namespace DataLens\DataLens\Tests;

use DataLens\DataLens\DataLensServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            DataLensServiceProvider::class,
        ];
    }
}

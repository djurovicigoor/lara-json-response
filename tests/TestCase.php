<?php

namespace DjurovicIgoor\LaraJsonResponse\Tests;

use DjurovicIgoor\LaraJsonResponse\LaraJsonResponseServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaraJsonResponseServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'LaraJsonResponse' => \DjurovicIgoor\LaraJsonResponse\Facades\LaraJsonResponse::class,
        ];
    }
}

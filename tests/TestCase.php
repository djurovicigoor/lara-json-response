<?php

namespace DjurovicIgoor\LaraJsonResponse\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use DjurovicIgoor\LaraJsonResponse\Facades\LaraJsonResponse;
use DjurovicIgoor\LaraJsonResponse\LaraJsonResponseServiceProvider;

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
            'LaraJsonResponse' => LaraJsonResponse::class,
        ];
    }
}

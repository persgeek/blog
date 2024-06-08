<?php

namespace PG\Blog\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

use PG\Blog\Providers\BlogServiceProvider;
use PG\Blog\Helpers;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        $providers = [
            BlogServiceProvider::class
        ];

        return $providers;
    }

    protected function loadMigrations()
    {
        $migrations = Helpers::packageDirectory('/migrations');

        $this->loadMigrationsFrom($migrations);

        $this->artisan('migrate');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrations();
    }
}

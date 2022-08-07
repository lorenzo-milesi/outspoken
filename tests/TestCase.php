<?php

namespace IloveCode\Outspoken\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use IloveCode\Outspoken\OutspokenServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'IloveCode\\Outspoken\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            OutspokenServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_outspoken_table.php.stub';
        $migration->up();
        */
    }
}

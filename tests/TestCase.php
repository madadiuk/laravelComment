<?php
namespace Imanborumand\LaravelComments\Tests;



use Imanborumand\LaravelComments\LaravelCommentsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders( $app) : array
    {
        return [
            LaravelCommentsServiceProvider::class,
        ];
    }



    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}

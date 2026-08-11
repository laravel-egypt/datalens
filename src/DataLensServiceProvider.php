<?php

namespace LaravelEgypt\DataLens;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use LaravelEgypt\DataLens\Livewire\DatalensIndex;
use LaravelEgypt\DataLens\Livewire\Sidebar;
use LaravelEgypt\DataLens\Livewire\TableViewer;
use LaravelEgypt\DataLens\Livewire\SqlEditor;
use LaravelEgypt\DataLens\Livewire\Settings;

class DataLensServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/datalens.php', 'datalens');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/datalens.php' => config_path('datalens.php'),
            ], 'datalens-config');
        }

        $this->registerAdditionalConnections();
        $this->registerRoutes();
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'datalens');

        Livewire::component('datalens::datalens-index', DatalensIndex::class);
        Livewire::component('datalens::sidebar', Sidebar::class);
        Livewire::component('datalens::table-viewer', TableViewer::class);
        Livewire::component('datalens::sql-editor', SqlEditor::class);
        Livewire::component('datalens::settings', Settings::class);
    }

    protected function registerAdditionalConnections()
    {
        $additional = config('datalens.additional_connections', []);
        
        if (!empty($additional)) {
            $connections = config('database.connections');
            config(['database.connections' => array_merge($connections, $additional)]);
        }
    }

    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('datalens.path', 'dev/datalens'),
            'middleware' => config('datalens.middleware', ['web']),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}

<?php

namespace Gildsmith\Support\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom($this->packagePath('config/gildsmith.php'), 'gildsmith');
    }

    /**
     * Helper function to build paths from the package root.
     */
    private function packagePath(string $path): string
    {
        return dirname(__DIR__, 2).'/'.$path;
    }

    public function boot(): void
    {
        $this->publishes([$this->packagePath('config/gildsmith.php') => config_path('gildsmith.php')], 'config');
    }
}

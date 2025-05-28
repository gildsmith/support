<?php

namespace Gildsmith\Support\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function boot(): void {

        // TODO
        arch()->preset()->custom('gildsmith', fn() => [
            expect(true)->toBeTrue(),
        ]);
    }
}
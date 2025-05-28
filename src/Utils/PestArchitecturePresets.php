<?php

/** @noinspection PhpInternalEntityUsedInspection */

namespace Gildsmith\Support\Utils;

use Pest\Preset;

abstract class PestArchitecturePresets
{
    public static function register(): void
    {
        Preset::custom('gildsmith', fn () => self::build());
    }

    public static function build(): array
    {
        return [
            self::factoriesConfiguration(),
        ];
    }

    public static function factoriesConfiguration()
    {
        return arch('models')
            ->expect('App\Models')
            ->toOnlyBeUsedIn('App\Repositories');
    }
}

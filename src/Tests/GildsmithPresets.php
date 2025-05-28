<?php

namespace Gildsmith\Support\Tests;

abstract class GildsmithPresets
{
    public static function register(): array
    {
        return [
            expect(true)->toBeTrue(),
        ];
    }
}
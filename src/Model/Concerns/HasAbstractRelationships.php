<?php

namespace Gildsmith\Support\Model\Concerns;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 *
 * @phpstan-require-extends Model
 */
trait HasAbstractRelationships
{
    use HasRelationships;

    protected function newRelatedInstance($class)
    {
        return tap($this->resolveInstance($class), function ($instance) {
            if (! $instance->getConnectionName()) {
                $instance->setConnection($this->connection);
            }
        });
    }

    protected function resolveInstance(string $class)
    {
        $instance = config("gildsmith.models.$class");

        if (is_string($instance)) {
            return new $instance;
        }

        if (app()->bound($class)) {
            return app($class);
        }

        return new $class;
    }
}

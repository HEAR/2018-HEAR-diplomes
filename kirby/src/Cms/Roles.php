<?php

namespace Kirby\Cms;

use Kirby\Toolkit\Dir;
use Kirby\Toolkit\F;

/**
 * Extension of the Collection class that
 * introduces `Roles::factory()` to convert an
 * array of role definitions into a proper
 * collection with Role objects. It also has
 * a `Roles::load()` method that handles loading
 * role definitions from disk.
 */
class Roles extends Collection
{
    public static function factory(array $roles, array $inject = []): self
    {
        $collection = new static;

        // read all user blueprints
        foreach ($roles as $props) {
            $role = Role::factory($props, $inject);
            $collection->set($role->id(), $role);
        }

        // always include the admin role
        if ($collection->find('admin') === null) {
            $collection->set('admin', Role::admin());
        }

        // return the collection sorted by name
        return $collection->sortBy('name', 'asc');
    }

    public static function load(string $root = null, array $inject = []): self
    {
        $roles = new static;

        // load roles from plugins
        foreach (App::instance()->extensions('blueprints') as $blueprintName => $blueprint) {
            if (substr($blueprintName, 0, 6) !== 'users/') {
                continue;
            }

            if (is_array($blueprint) === true) {
                $role = Role::factory($blueprint, $inject);
            } else {
                $role = Role::load($blueprint, $inject);
            }

            $roles->set($role->id(), $role);
        }

        // load roles from directory
        if ($root !== null) {
            foreach (Dir::read($root) as $filename) {
                if ($filename === 'default.yml') {
                    continue;
                }

                $role = Role::load($root . '/' . $filename, $inject);
                $roles->set($role->id(), $role);
            }
        }

        // always include the admin role
        if ($roles->find('admin') === null) {
            $roles->set('admin', Role::admin($inject));
        }

        // return the collection sorted by name
        return $roles->sortBy('name', 'asc');
    }
}

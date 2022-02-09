<?php

use App\Models\Role;
use Illuminate\Database\Eloquent\Factory;

/**
 * @var Factory $factory
 */
$factory->define(Role::class, function () {
    return [
        'name' => 'Test role',
        'description' => 'The Test role.',
    ];
});

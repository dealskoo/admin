<?php

namespace Database\Factories\Dealskoo\Admin\Models;

use Dealskoo\Admin\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}

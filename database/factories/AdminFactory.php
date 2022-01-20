<?php

namespace Database\Factories\Dealskoo\Admin\Models;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'avatar' => $this->faker->imageUrl(60, 60),
            'name' => $this->faker->name(),
            'bio' => $this->faker->text(30),
            'email' => $this->faker->unique->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'owner' => false,
            'status' => true,
            'remember_token' => Str::random(10),
        ];
    }

    public function isOwner()
    {
        return $this->state(function (array $attributes) {
            return [
                'owner' => true,
            ];
        });
    }

    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => false,
            ];
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => Role::factory(),
            'user_id' => User::factory(),
        ];
    }
}

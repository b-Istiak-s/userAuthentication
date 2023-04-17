<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Guardian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class childFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "guardian_id" => Guardian::factory(),
            "password" => Hash::make($this->faker->password()),
            "child_username" => $this->faker->unique()->username(),
            "child_name" => $this->faker->name()
        ];
    }
}

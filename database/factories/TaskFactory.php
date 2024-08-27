<?php

namespace Database\Factories;

use Stringable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->text(5),
            'content'=>fake()->text(400),
            'slug' => fn(array $attributes) => Str::slug($attributes['title']),
            'user_id'=>2,
        ];
    }
}

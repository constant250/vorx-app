<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $code = strtoupper(Str::random(7));
        $name = $this->faker->company();

        return [
            'title' => "{$code} - {$name}",
            'code' => $code,
            'name' => $name,
            'target_enrolee' => rand(0,500),
            'tp_code' => Str::random(5),
            'user_id' => 1,
            'account_id' => 1,
        ];
    }
}

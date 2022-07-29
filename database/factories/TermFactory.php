<?php

namespace Database\Factories;

use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Term>
 */
class TermFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => ($this->faker->randomDigit() >= 5 ? "Fall" : "Spring") . $this->faker->year(),
            'code' => $this->faker->numberBetween(200000, 30000),
            'start' => $this->faker->date(),
            'end' => $this->faker->date()
        ];
    }
}

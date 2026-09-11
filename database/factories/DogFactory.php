<?php

namespace Database\Factories;

use App\Models\Dog;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends Factory<Dog>
 */
class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->firstname(),
            'breed' => fake()->randomElement([
                'Labrador Retriever',
                'Golden Retriever',
                'German Shepherd',
                'French Bulldog',
                'Beagle',
                'Dachshund',
                'Poodle',
                'Boxer',
            ]),
            'chip_number' => fake()->uuid(),
            'birthdate' => fake()->dateTimeBetween(startDate: '-15 years', endDate: 'now')->format('Y-m-d'),
            'training' => fake()->boolean(),
            'client_id' => Client::inRandomOrder()->first()->id,
        ];
    }
}

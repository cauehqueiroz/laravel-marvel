<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'format' => $this->faker->randomElement(['magazine','comic','graphic novel']),
            'issueNumber' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
        ];
    }
}

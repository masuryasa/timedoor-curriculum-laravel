<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->isbn13(),
            'title' => $this->faker->words(rand(3, 8), true),
            'author' => $this->faker->name,
            'image_path' => $this->faker->imageUrl,
            'publisher' => $this->faker->company,
            'category' => $this->faker->words(1, true),
            'pages' => $this->faker->randomDigitNotNull,
            'language' => $this->faker->languageCode,
            'publish_date' => $this->faker->dateTimeBetween('-40 years', '-2 years'),
            'subjects' => $this->faker->words(3, true),
            'desc' => $this->faker->paragraphs(rand(2, 4), true),
        ];
    }
}

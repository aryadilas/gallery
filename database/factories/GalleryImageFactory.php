<?php

namespace Database\Factories;

use App\Models\GalleryImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryImageFactory extends Factory
{
    protected $model = GalleryImage::class;

    public function definition(): array
    {
        return [
            'filename' => fake()->lexify('??????.jpg'),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(10),
            'alt_text' => fake()->sentence(4),
            'sort_order' => fake()->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(100),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph(8),
            'featured_image' => $this->faker->imageUrl(850,350),
            'featured_post' => $this->faker->boolean,
            'active' => $this->faker->boolean,
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}

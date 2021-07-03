<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     * @return array
     */
    public function definition()
    {
        $categoryId = Category::all()->pluck('id')->toArray();
        $tagId = Tag::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(600,400),
            'description' => $this->faker->text(400),
            'category_id' => $this->faker->randomElement($categoryId),
            //'tag_id' => $this->faker->randomElement($tagId),
            'user_id' => 1,
        ];
        
    } 

} 

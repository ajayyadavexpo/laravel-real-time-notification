<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->paragraph(1),
            'description' => $this->faker->paragraph(4),
            'user_id' => User::get()->random()->id
        ];
    }
}

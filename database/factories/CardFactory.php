<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'token' => Str::random(10),
            'code' =>   generateRandomCode('pro'),
            'category_id' => $this->faker->randomElement([1, 2, 3]),
            'subcategory_id' => $this->faker->randomElement([1, 2, 3]),
            'admin_id' => $this->faker->randomElement([1]),
            'manger_id' => $this->faker->randomElement([1]),
            'origin_id' => $this->faker->randomElement([1]),


        ];
    }
}
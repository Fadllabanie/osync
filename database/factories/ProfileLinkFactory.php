<?php

namespace Database\Factories;

use App\Models\ProfileLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'name' => $this->faker->name,
            'status' =>true
        ];
    }
}

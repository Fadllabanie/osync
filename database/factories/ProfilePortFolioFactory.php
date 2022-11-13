<?php

namespace Database\Factories;

use App\Models\ProfilePortFolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilePortFolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfilePortFolio::class;

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

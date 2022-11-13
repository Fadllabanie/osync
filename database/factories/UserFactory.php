<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'code' => generateRandomCode('USR'),
            'mobile' => '0115265' . $this->faker->numerify('#####'),
            'email' => $this->faker->unique()->safeEmail(),
            'cover' => $this->faker->imageUrl(),
            'avatar' => $this->faker->imageUrl(),
            'city_id' => $this->faker->randomNumber($nbDigits = 1),
            'country_id' => $this->faker->randomNumber($nbDigits =1),
            'verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'device_token' => Str::random(10),
        ];
    }
}

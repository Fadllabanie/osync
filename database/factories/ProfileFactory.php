<?php

namespace Database\Factories;


use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => generateRandomCode('PRF'),
            'category_id' =>  $this->faker->randomElement([1, 2, 3]),
            'industrie_id' =>  $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'prefix' => $this->faker->randomElement(['MR', 'MS']),
            'type' => $this->faker->randomElement(['adult', 'child', 'animal']),
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'nike_name' => $this->faker->name,
            'mobile' => '0115265' . $this->faker->numerify('#####'),
            'email' => $this->faker->unique()->safeEmail,
            'gender' =>  $this->faker->randomElement([1, 2, 3]),
            'birthday' => $this->faker->date($format = 'Y-m-d'),
            'home_phone' => '0115265' . $this->faker->numerify('#####'),

            #######################
            'home_address' => $this->faker->sentence(),
            'school_address' => $this->faker->sentence(),
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'O+']),
            #######################
            'animal_type' => $this->faker->randomElement(['CAT', 'DOG']),
            'owner_mobile' => '0115265' . $this->faker->numerify('#####'),
            #######################

            'organization' => $this->faker->name,
            'organization_url' => $this->faker->url,
            'organization_address' => $this->faker->sentence(),
            'work_mobile' => '0115265' . $this->faker->numerify('#####'),
            'fax' => '0115265' . $this->faker->numerify('#####'),
            'work_phone' => '0115265' . $this->faker->numerify('#####'),
            'role' => $this->faker->name,
            'work_email' => $this->faker->unique()->safeEmail,

            'is_default' => false,
            'status' => true,
        ];
    }
}

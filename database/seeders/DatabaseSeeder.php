<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Interest;
use App\Models\Passenger;
use App\Models\Experience;
use App\Models\Nationality;
use App\Models\CaptainGallery;
use App\Models\ExperienceMedia;
use App\Models\Admin;
use App\Models\Card;
use App\Models\Category;
use App\Models\Country;
use App\Models\Faq;
use App\Models\Industry;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Profile;
use App\Models\ProfileLink;
use App\Models\ProfilePortFolio;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Category::factory(5)->create()->each(function ($data) {
      SubCategory::factory($data)->count(2)->create([
        'category_id' => $data->id,
      ]);
    });
    
    Industry::factory(10)->create();
    Faq::factory(10)->create();
    Platform::factory(10)->create();

    Country::factory()->count(5)->create()->each(function ($data) {
      City::factory($data)->count(2)->create([
        'country_id' => $data->id,
      ]);
    });

    User::factory()->count(10)->create()->each(function ($data) {
      Profile::factory($data)->count(2)->create([
        'user_id' => $data->id,
      ])->each(function ($profile) {
        ProfileLink::factory($profile)->count(5)->create(['profile_id' => $profile->id]);
        ProfilePortFolio::factory($profile)->count(5)->create(['profile_id' => $profile->id]);
      });
    });
    Card::factory(10)->create();
    Product::factory(10)->create();

  }
}

<?php

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < Config::get('seeding.locations'); $i++) {
            Location::create([
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude
            ]);
        }
    }
}

<?php

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < Config::get('seeding.addresses'); $i++) {
            Address::create([
                'house_number' => $faker->numberBetween(1, 100),
                'street' => $faker->streetName,
                'ward' => $faker->address,
                'district' => $faker->text(100),
                'city' => $faker->city
            ]);
        }
    }
}

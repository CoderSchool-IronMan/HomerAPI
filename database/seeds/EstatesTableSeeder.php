<?php

use App\Models\Address;
use App\Models\Estate;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class EstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = array_column(Address::all()->toArray(), 'id');
        $locations = array_column(Location::all()->toArray(), 'id');
        $users = array_column(User::all()->toArray(), 'id');
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < Config::get('seeding.estates'); $i++) {
            Estate::create([
                'fk_location' => $faker->randomElement($locations),
                'fk_address' => $faker->randomElement($addresses),
                'fk_user' => $faker->randomElement($users)
            ]);
        }
    }
}

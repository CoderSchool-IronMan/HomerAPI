<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userStatuses = [
            'active',
//            'inactive',
//            'banned',
        ];
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < Config::get('seeding.users'); $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password(),
                'phone' => $faker->phoneNumber,
                'rating' => $faker->numberBetween(1, 5),
                'status' => $faker->randomElement($userStatuses)
            ]);
        }
    }
}

<?php

use App\Models\Estate;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ReactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array_column(User::all()->toArray(), 'id');
        $estates = array_column(Estate::all()->toArray(), 'id');
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < Config::get('seeding.reactions'); $i++) {
            Reaction::create([
                'action_type' => $faker->randomElement(Reaction::$types),
                'fk_user' => $faker->randomElement($users),
                'fk_estate' => $faker->randomElement($estates)
            ]);
        }
    }
}

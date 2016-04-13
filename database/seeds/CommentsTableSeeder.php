<?php

use App\Models\Comment;
use App\Models\Estate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class CommentsTableSeeder extends Seeder
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

        for ($i = 0; $i < Config::get('seeding.comments'); $i++) {
            Comment::create([
                'fk_user' => $faker->randomElement($users),
                'fk_estate' => $faker->randomElement($estates)
            ]);
        }
    }
}

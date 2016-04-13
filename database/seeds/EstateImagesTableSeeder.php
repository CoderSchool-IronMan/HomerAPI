<?php

use App\Models\EstateImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class EstateImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estates = array_column(Estate::all()->toArray(), 'id');

        $faker = Faker\Factory::create('vi_VN');
        $imagesUrl = [];
        for ($i = 1; $i <= 21; $i++) {
            $imagesUrl[] = 'public/estates_image' . $i . 'jpg';
        }

        for ($i = 0; $i < Config::get('seeding.estate_images'); $i++) {
            EstateImage::create([
                'url' => $faker->randomElement($imagesUrl),
                'fk_estate' => $faker->randomElement($estates)
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('What the hell?');
        }
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $tables = [
            'addresses',
            'comments',
            'estate_images',
            'estates',
            'locations',
            'password_resets',
            'reactions',
            'search_queries',
            'users',
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(UsersTableSeeder::class);
    }
}

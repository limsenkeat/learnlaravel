<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        factory(App\User::class, 3)->create()->each(function($user){

            $user->post()->save(factory(App\Post::class)->make());

        }); //create 3 user with 1 post
    }
}

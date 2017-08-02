<?php

use DroneBox\Models\Profile;
use DroneBox\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'name' => 'Marcus Campos',
                'email' => 'marcus.campos@devyzi.com',
                'password' => bcrypt('987987'),
                'remember_token' => str_random(10),
            ]
        )->profiles()->save(factory(Profile::class)->make());

        factory(User::class, 100)->create()->each(function ($u){
            $u->profiles()->save(factory(Profile::class)->make());
        });
    }
}

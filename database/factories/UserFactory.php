<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    
    $faker = \Faker\Factory::create('ms_MY');
    $roles = [
        'admin',
        'general_user',
    ];

    foreach ($roles as $role)
    {
        for ($i = 0; $i < 10; $i++) {
            $user = \App\User::updateOrCreate([
            'name' => $faker->name,
            'username' => $faker->userName,
            'email' =>'general_user'. '_' . $i . '@example.com',
            'email_verified_at' => now(),
            'phone_no'=> cleanPhoneNumber($faker->phoneNumber),
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
            'role' => 'general_user',
            ]);
        }
    }
});

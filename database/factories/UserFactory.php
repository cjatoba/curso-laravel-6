<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        //email_verified_at é um valor opcional
        'email_verified_at' => now(),
        //No passwird pode ser utilizado a hash direta como no exemplo abaixo
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //ou passarmos uma senha e criptografar ela com a função bcrypt
        'password' => bcrypt(123456),
        //remeber_token é um valor opcional
        'remember_token' => Str::random(10),
    ];
});

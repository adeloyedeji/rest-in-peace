<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    $fname = $faker->firstName;
    $lname = $faker->lastName;
    return [
        'fname' => $fname,
        'lname' => $lname,
        'oname' => $faker->name,
        'remember_token' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'username' => $fname . "." . $lname,
        'phone' => $faker->e164PhoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

$factory->define(App\Project::class, function(Faker $faker) {
    return [
        'title' => $faker->words(5, true),
        'code' => "FCDA/DRC/" . $faker->countryISOAlpha3 . "/18/" . $faker->numberBetween(1, 1000),
        'lgas_id' => $faker->numberBetween(1, 700),
        'city' => $faker->city,
        'created_by' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});

$factory->define(App\Occupation::class, function(Faker $faker) {
    return [
        'title' => $faker->jobTitle
    ];
});

$factory->define(App\Beneficiary::class, function(Faker $faker) {
    $fname = $faker->name;
    $lname = $faker->name;
    $sizes = ['1 - 2', '3 - 6', '7 - 14', '15 - 20', 'Over 20'];
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'oname' => $faker->name,
        'gender' => $faker->numberBetween(0, 1),
        'dob' => "1997-09-11",
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->freeEmail,
        'wives_total' => $faker->numberBetween(1, 2000),
        'children_total' => $faker->numberBetween(1, 2000),
        'occupations_id' => function() {
            return factory(App\Occupation::class)->create()->id;
        },
        'tribe' => $faker->tribe,
        'household_head' => $faker->name,
        'household_head_photo' => $faker->imageUrl($width = 80, $height = 80),
        'street' => $faker->streetAddress,
        'lgas_id' => $faker->numberBetween(1, 700),
        'city' => $faker->city,
        'states_id' => $faker->numberBetween(1, 36),
        'household_size' => $sizes[rand(0,4)],
        'created_by' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});

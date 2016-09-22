<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
	//$teams = (array) App\Models\Team::inRandomOrder()->get();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'email' => $faker->safeEmail,
        'zip'  => $faker->postcode,
        //'team_id' => App\Models\Team::all()->random(1)->id,
        'team_name' => $faker->realText(30),
        'teammates' => $faker->numberBetween(1, 20),
        'username' => $faker->realText(20),
        'team_description' => $faker->realText(100),
        'teammates' => 'team here',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Waste::class, function (Faker\Generator $faker) {
    $d=$faker->dateTimeBetween('-9 months', $endDate = 'now', $timezone = date_default_timezone_get());
    return [
        'description' => $faker->realText(100),
        'user_id' => App\Models\User::all()->random(1)->id,
        'waste_type_id' => App\Models\WasteType::all()->random(1)->id,
        'weight' => $faker->randomFloat(2, 0, 1), 
        'cost' => $faker->randomFloat(2, 0, 2),
        'created_at' => $d,
        'updated_at' => $d,
    ];
});
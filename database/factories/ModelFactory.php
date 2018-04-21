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
        'timezone'  => $faker->timezone,
        'team_name' => $faker->company(),
        'teammates' => $faker->numberBetween(1, 20),
        'team_type' => array_rand(Config::get('enums.phone_types'),1),
        'username' => $faker->userName(),
        'last_ip' => $faker->ipv4(),
        'team_description' => $faker->realText(100),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Waste::class, function (Faker\Generator $faker) {
    $d=$faker->dateTimeBetween('-9 months', $endDate = 'now', $timezone = date_default_timezone_get());

    $waste = array(
  array('name' => 'Onion Soup','lbs' => '3.33','cost' => '2.00'),
  array('name' => 'Cooked Potatoes','lbs' => '0.41','cost' => '1.00'),
  array('name' => 'Vegetable Soup','lbs' => '2.13','cost' => '0.75'),
  array('name' => 'Muffins, Overcooked','lbs' => '0.81','cost' => '0.86'),
  array('name' => 'Coleslaw','lbs' => '1.06','cost' => '0.65'),
  array('name' => 'Mashed Potatoes','lbs' => '1.09','cost' => '1.00'),
  array('name' => 'Pork stir fry','lbs' => '0.44','cost' => '0.15'),
  array('name' => '1/2 Bagel/Cream Cheese','lbs' => '0.03','cost' => '0.40'),
  array('name' => 'Satsuma','lbs' => '0.06','cost' => '0.89'),
  array('name' => 'Bread','lbs' => '0.39','cost' => '0.50'),
  array('name' => 'Polenta','lbs' => '0.50','cost' => '1.50'),
  array('name' => 'Bacon','lbs' => '0.19','cost' => '1.00'),
  array('name' => 'Blueberries','lbs' => '0.09','cost' => '0.75'),
  array('name' => 'avocado','lbs' => '0.36','cost' => '1.99'),
  array('name' => 'cider','lbs' => '2.00','cost' => '2.00'),
  array('name' => 'Avocado','lbs' => '0.41','cost' => '1.99'),
  array('name' => 'Taco','lbs' => '0.38','cost' => '0.50'),
  array('name' => 'Darn avocado ','lbs' => '0.10','cost' => '0.25'),
  array('name' => 'Chicken','lbs' => '0.25','cost' => '3.00'),
  array('name' => 'Roasted vegetables','lbs' => '0.06','cost' => '3.00'),
  array('name' => 'Pizza crust, gluten free (king arthur flour)','lbs' => '0.39','cost' => '2.00'),
  array('name' => 'Challah','lbs' => '0.21','cost' => '0.75'),
  array('name' => 'Babka','lbs' => '0.83','cost' => '4.00'),
  array('name' => 'Grapefruit juice','lbs' => '0.31','cost' => '0.20'),
  array('name' => 'Cucumber','lbs' => '0.75','cost' => '1.50'),
  array('name' => 'Chicken','lbs' => '0.24','cost' => '1.50'),
  array('name' => 'Squash','lbs' => '0.83','cost' => '0.50'),
  array('name' => 'Rice','lbs' => '0.24','cost' => '0.07'),
  array('name' => 'Sour Cream','lbs' => '0.20','cost' => '0.50'),
  array('name' => 'Bread (moldy)','lbs' => '0.30','cost' => '0.30'),
  array('name' => 'Wilty lettuce','lbs' => '0.05','cost' => '0.10'),
  array('name' => 'Nachos','lbs' => '0.13','cost' => '1.50'),
  array('name' => 'Guacamole','lbs' => '0.06','cost' => '0.25'),
  array('name' => 'Muesli','lbs' => '1.00','cost' => '0.75'),
  array('name' => 'Bacon','lbs' => '0.06','cost' => '0.25'),
  array('name' => 'Pear','lbs' => '0.21','cost' => '0.50'),
  array('name' => 'Oats','lbs' => '0.56','cost' => '0.25'),
  array('name' => 'Banana','lbs' => '0.25','cost' => '0.75'),
  array('name' => 'Grapefruit','lbs' => '0.13','cost' => '0.25'),
  array('name' => 'Potato, rotten','lbs' => '0.19','cost' => '0.50'),
  array('name' => 'cranberries','lbs' => '0.78','cost' => '1.50'),
  array('name' => 'pizza','lbs' => '0.77','cost' => '0.50'),
  array('name' => 'Egg','lbs' => '0.09','cost' => '0.50'),
  array('name' => 'Tomato','lbs' => '0.03','cost' => '0.10'),
  array('name' => 'Apple','lbs' => '0.24','cost' => '0.50'),
  array('name' => 'Lemongrass tube','lbs' => '0.46','cost' => '2.75'),
  array('name' => 'Bagels','lbs' => '0.50','cost' => '0.55'),
  array('name' => 'Beer, Heart of Darkness','lbs' => '0.13','cost' => '0.00'),
  array('name' => 'Pretzels, yogurt covered','lbs' => '0.19','cost' => '1.00'),
  array('name' => 'Rice, Spanish','lbs' => '1.00','cost' => '0.25'),
  array('name' => 'Tomatoes, crushed','lbs' => '0.50','cost' => '0.75'),
  array('name' => 'Parsnips','lbs' => '0.69','cost' => '1.00'),
  array('name' => 'French Fries (Archie\'s)','lbs' => '0.09','cost' => '1.50'),
  array('name' => 'Apple','lbs' => '0.41','cost' => '0.75'),
  array('name' => 'Soup','lbs' => '0.35','cost' => '0.50'),
  array('name' => 'Bread','lbs' => '0.45','cost' => '0.50'),
  array('name' => 'Zucchini','lbs' => '0.30','cost' => '0.25'),
  array('name' => 'Brownie','lbs' => '0.09','cost' => '0.20'),
  array('name' => 'Salad','lbs' => '0.15','cost' => '0.75'),
  array('name' => 'Ham','lbs' => '0.08','cost' => '0.50'),
  array('name' => 'Hummus','lbs' => '0.09','cost' => '0.50'),
  array('name' => 'Jalepeno Chips','lbs' => '0.11','cost' => '1.50'),
  array('name' => 'Sandwich','lbs' => '0.06','cost' => '0.50'),
  array('name' => 'egg','lbs' => '0.96','cost' => '1.00'),
  array('name' => 'Apple','lbs' => '1.04','cost' => '1.50'),
  array('name' => 'Bacon','lbs' => '0.04','cost' => '0.50'),
  array('name' => 'Salad','lbs' => '0.22','cost' => '1.00'),
  array('name' => 'Hash Browns','lbs' => '0.23','cost' => '0.50'),
  array('name' => 'Eggs','lbs' => '0.19','cost' => '0.00'),
  array('name' => 'Yogurt','lbs' => '0.25','cost' => '0.75'),
  array('name' => 'tomato soup','lbs' => '0.25','cost' => '0.25'),
  array('name' => 'steak','lbs' => '0.11','cost' => '0.75'),
  array('name' => 'Rice','lbs' => '0.31','cost' => '0.25'),
  array('name' => 'Catfish','lbs' => '0.50','cost' => '1.50'),
  array('name' => 'Yogurt','lbs' => '0.13','cost' => '0.75'),
  array('name' => 'Mixed Breads','lbs' => '0.81','cost' => '1.25'),
  array('name' => 'Juice','lbs' => '0.19','cost' => '0.10'),
  array('name' => 'tofu','lbs' => '0.13','cost' => '0.50'),
  array('name' => 'Bok Choy','lbs' => '0.16','cost' => '0.50'),
  array('name' => 'Bagel','lbs' => '0.22','cost' => '0.30'),
  array('name' => 'Fennel Salad','lbs' => '0.56','cost' => '1.25'),
  array('name' => 'Grapefruit','lbs' => '0.36','cost' => '0.80'),
  array('name' => 'Lemon','lbs' => '0.05','cost' => '0.50'),
  array('name' => 'Beer','lbs' => '0.25','cost' => '0.00'),
  array('name' => 'Izze','lbs' => '0.38','cost' => '0.50'),
  array('name' => 'Gatorade','lbs' => '0.38','cost' => '0.50'),
  array('name' => 'Chili','lbs' => '0.39','cost' => '1.00'),
  array('name' => 'Refried beans','lbs' => '0.29','cost' => '1.00'),
  array('name' => 'rice','lbs' => '1.56','cost' => '2.50'),
  array('name' => 'asian vegetable stew','lbs' => '0.19','cost' => '0.35'),
  array('name' => 'Mixed waste','lbs' => '1.27','cost' => '1.50'),
  array('name' => 'Bread','lbs' => '0.31','cost' => '0.50'),
  array('name' => 'Rice','lbs' => '0.13','cost' => '0.25'),
  array('name' => 'mixed roots','lbs' => '0.50','cost' => '0.75'),
  array('name' => 'salad','lbs' => '0.38','cost' => '1.00'),
  array('name' => 'Quinoa','lbs' => '0.13','cost' => '0.50'),
  array('name' => 'Pancakes','lbs' => '0.31','cost' => '0.40'),
  array('name' => 'Shitty Cheese','lbs' => '0.50','cost' => '3.00'),
  array('name' => 'Bread','lbs' => '0.31','cost' => '1.00'),
  array('name' => 'Brussels Sprouts (stinky)','lbs' => '0.38','cost' => '1.00'),
  array('name' => 'Pizza Doughs (yes, plural)','lbs' => '2.50','cost' => '3.00'),
  array('name' => 'Broccoli','lbs' => '0.19','cost' => '1.00'),
  array('name' => 'Burritotype fillings','lbs' => '0.38','cost' => '2.50'),
  array('name' => 'Baked potatoes','lbs' => '1.24','cost' => '1.80'),
  array('name' => 'Apple ','lbs' => '0.12','cost' => '0.70'),
  array('name' => 'Apple ','lbs' => '0.12','cost' => '0.70'),
  array('name' => 'Coconut Milk','lbs' => '0.13','cost' => '0.80'),
  array('name' => 'Chai Tea (organic, old)','lbs' => '0.25','cost' => '0.40'),
  array('name' => 'meat','lbs' => '0.75','cost' => '4.00'),
  array('name' => 'Bread','lbs' => '0.56','cost' => '0.75'),
  array('name' => 'Sandwich','lbs' => '0.03','cost' => '0.30'),
  array('name' => 'Pickles','lbs' => '2.25','cost' => '4.00'),
  array('name' => 'Mixed salad','lbs' => '0.63','cost' => '1.50'),
  array('name' => 'banana','lbs' => '0.19','cost' => '0.00'),
  array('name' => 'biscuits','lbs' => '0.34','cost' => '1.50'),
  array('name' => 'Noodles','lbs' => '1.06','cost' => '2.00'),
  array('name' => 'Tacos','lbs' => '1.09','cost' => '3.00'),
  array('name' => 'ChÃ¨vre','lbs' => '0.38','cost' => '3.00'),
  array('name' => 'Bread','lbs' => '0.56','cost' => '1.00'),
  array('name' => 'Rice','lbs' => '0.31','cost' => '0.50'),
  array('name' => 'Eggs','lbs' => '1.00','cost' => '3.00'),
  array('name' => 'Thing','lbs' => '0.06','cost' => '12.00')
);
$fakewaste=$waste[array_rand($waste, 1)];

    return [
        'description' => $fakewaste['name'],
        'user_id' => App\Models\User::all()->random(1)->id,
        'waste_type_id' => App\Models\WasteType::all()->random(1)->id,
        'weight' => $fakewaste['lbs'],//$faker->randomFloat(2, 0, 1), 
        'cost' => $fakewaste['cost'], //$faker->randomFloat(2, 0, 2),
        'created_at' => $d,
        'updated_at' => $d,
    ];
});

$factory->define(App\Models\Challenge::class, function (Faker\Generator $faker) {
    $user = App\Models\User::all()->random(1);
    $d=$faker->dateTimeBetween('-1 months', $endDate = 'now', $timezone = date_default_timezone_get());
    $start=$faker->dateTimeBetween('-3 weeks', '+1 week', date_default_timezone_get());
    $end=$faker->dateTimeBetween($start, '+3 months', date_default_timezone_get());

    return [
        'description' => $faker->realText(100),
        'name' => $faker->company,
        'owner_id' => 1,//$user->id,
        'start_date' => $start,
        'end_date' => $end,
    ];
});
<?php

use App\QuestionsOption;
use Illuminate\Support\Str;
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

$factory->define(QuestionsOption::class, function (Faker $faker) {
    return [
        'option_text' => $faker->text(50) . '?',
        'correct' => rand(0, 1),
    ];
});

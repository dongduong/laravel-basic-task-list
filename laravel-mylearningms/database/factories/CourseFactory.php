<?php

use App\Course;
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

$factory->define(Course::class, function (Faker $faker) {
	$name = $faker->name;
    return [
        'title' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(),
        'price' => $faker->randomFloat(2, 0 , 199),
        'published' => 1,
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Products;
use App\User;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
		'user_id' => factory(User::class)->create()->id,
		'name' => $faker->name,
    ];
});

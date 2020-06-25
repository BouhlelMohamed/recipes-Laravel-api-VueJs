<?php

$factory->define(\App\Recipes::class,function(\Faker\Generator $faker){
    return [
        'name'  =>  $faker->words,
        'description'=> $faker->paragraph
    ];
});
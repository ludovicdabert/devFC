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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ? : $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// define premier paramètre le nom du modèle à hydrater et en second paramètre une fonction anonyme 
// qui récupère par injection de dépendance le composant permettant la génération de données d'exemple
$factory->define(App\Robot::class, function (Faker\Generator $faker) {

    $name = $faker->name;

    return [
        'user_id' => rand(1, 3) == 1 ? NULL : rand(1, 5),
        'category_id' => rand(1, 3) == 1 ? NULL : rand(1, 3),
        'name' => $name, // nom généré de manière aléatoire
        'slug' => str_slug($name), // permet de générer un slug à partir d'une chaîne de caractères, fonction Laravel
        'description' => $faker->paragraph(rand(3, 5)), // de 3 à 5 paragraphe lorem ipsum 
        'published_at' => $faker->dateTime(),
        // de manière aléatoire on fixe le status
        'status' => rand(1, 3) == 1 ? 'published' : (rand(1, 3) == 1 ? 'unpublished' : 'draft')
    ];
});

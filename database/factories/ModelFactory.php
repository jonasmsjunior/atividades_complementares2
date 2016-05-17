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

$factory->define(SISAC\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(SISAC\Entities\Curso::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->text,
        'horas_atividades' => random_int(100,200),
    ];
});

$factory->define(SISAC\Entities\Aluno::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'matricula' => random_int(10000,200000),
    ];
});

$factory->define(SISAC\Entities\AlunoCurso::class, function (Faker\Generator $faker) {
    return [
        'aluno_id' => random_int(1,10),
        'curso_id' => random_int(1,10),
    ];
});

$factory->define(SISAC\Entities\Atividade::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'descricao' => $faker->text,
        'data_inicio' => $faker->dateTime,
        'data_conclusao' => $faker->dateTime,
        'horas' => random_int(20,110),
    ];
});
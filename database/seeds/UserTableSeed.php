<?php

/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 15/05/2016
 * Time: 17:22
 */
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    public function run()
    {
        factory(\SISAC\Entities\User::class)->create([
            'name' => "jonas",
            'email' => "jonas.uft@gmail.com",
            'password' => bcrypt(112233),
            'remember_token' => str_random(10),
        ]);
        factory(\SISAC\Entities\User::class,10)->create();
    }
}
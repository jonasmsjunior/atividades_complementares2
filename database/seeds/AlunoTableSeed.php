<?php

use Illuminate\Database\Seeder;

class AlunoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\SISAC\Entities\Aluno::truncate();
        factory(\SISAC\Entities\Aluno::class,10)->create();
    }
}

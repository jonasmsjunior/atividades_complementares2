<?php

use Illuminate\Database\Seeder;

class AtividadeTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\SISAC\Entities\Aluno::truncate();
        factory(\SISAC\Entities\Atividade::class,10)->create();
    }
}

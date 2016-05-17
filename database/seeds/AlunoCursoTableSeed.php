<?php

use Illuminate\Database\Seeder;

class AlunoCursoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\SISAC\Entities\AlunoCurso::truncate();
        factory(\SISAC\Entities\AlunoCurso::class,10)->create();
    }
}

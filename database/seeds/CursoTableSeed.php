<?php

use Illuminate\Database\Seeder;

class CursoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\SISAC\Entities\Curso::truncate();
        factory(\SISAC\Entities\Curso::class,10)->create();
    }
}

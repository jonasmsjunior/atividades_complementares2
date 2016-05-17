<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CursoTableSeed::class);
        $this->call(AlunoTableSeed::class);
        $this->call(AlunoCursoTableSeed::class);
        $this->call(UserTableSeed::class);
        $this->call(AtividadeTableSeed::class);
    }
}

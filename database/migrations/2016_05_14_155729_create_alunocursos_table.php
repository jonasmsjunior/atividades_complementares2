<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunocursosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno_cursos', function(Blueprint $table) {
			$table->integer('aluno_id')->unsigned();
			$table->foreign('aluno_id')->references('id')->on('alunos');
			$table->integer('curso_id')->unsigned();
			$table->foreign('curso_id')->references('id')->on('cursos');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno_cursos');
	}

}

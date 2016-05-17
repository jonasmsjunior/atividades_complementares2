<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atividades', function(Blueprint $table) {
            $table->increments('id');
			$table->text('nome');
			$table->longText('descricao');
			$table->dateTime('data_inicio');
			$table->dateTime('data_conclusao');
			$table->decimal('horas');
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
		Schema::drop('atividades');
	}

}

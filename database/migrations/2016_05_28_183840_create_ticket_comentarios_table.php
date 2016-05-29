<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_comentarios', function(Blueprint $table)
		{ 
			$table->increments('id');

			$table->text('comentario');

			$table->string('link')->nullable();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('tickets');

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
		Schema::drop('ticket_comentarios');
	}

}

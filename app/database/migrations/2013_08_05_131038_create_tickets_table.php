<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('summary');
			$table->text('description');
			$table->integer('assignee_id');
			$table->integer('creator_id');
			$table->integer('category_id');
			$table->string('priority');
			$table->datetime('due');
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
		Schema::drop('tickets');
	}

}

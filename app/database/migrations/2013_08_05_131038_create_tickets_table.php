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
			$table->integer('assignee_id')->unsigned()->nullable();
			$table->integer('creator_id')->unsigned()->nullable();
			$table->integer('department_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->string('priority',1)->default('3');
			$table->datetime('due')->nullable();
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSection extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
				Schema::drop('sections');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name','50');
		    $table->longText('desc')->nullable();
			$table->timestamps();
		});
	}

}

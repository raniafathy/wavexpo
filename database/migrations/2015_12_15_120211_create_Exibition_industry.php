<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExibitionIndustry extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition_industries', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('exhibition_id')->unsigned();
			$table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
			
			$table->integer('industry_id')->unsigned();
			$table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
			
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
						Schema::drop('exhibition_industries');
	}

}

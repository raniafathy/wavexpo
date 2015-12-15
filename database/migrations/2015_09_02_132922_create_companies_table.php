<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');

			$table->longtext('desc')->nullable();
			$table->longText('address')->nullable();
            $table->string('phone','20')->nullable();
			$table->string('anotherphone','20')->nullable();
            $table->string('logo','100')->nullable();
            $table->string('website','100')->nullable();			
			$table->string('fax','30')->nullable();
			$table->string('facebook','100')->nullable();
			$table->string('twitter','100')->nullable();
			$table->string('linkedIn','100')->nullable();
			
			$table->integer('country_id')->unsigned()->nullable();
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

		    $table->string('city','30')->nullable();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			


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
		Schema::drop('companies');
	}

}

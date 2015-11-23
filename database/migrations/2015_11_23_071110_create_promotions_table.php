<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotions', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('distributor_id')->unsigned()->comment('Distributor ID');
			$table->string('name');
			$table->timestamp('start_at')->comment('Start at');
			$table->timestamp('end_at')->comment('End at');
			$table->timestamps();
		});

		Schema::table('promotions', function (Blueprint $table)
		{
			$table->foreign('distributor_id')
				->references('id')
				->on('distributors')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('promotions');
	}

}

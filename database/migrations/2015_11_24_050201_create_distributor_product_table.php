<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distributor_product', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('distributor_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();
			$table->timestamps();
		});

		Schema::table('distributor_product', function (Blueprint $table)
		{
			$table->foreign('distributor_id')
				->references('id')
				->on('distributors')
				->onDelete('cascade');

			$table->foreign('product_id')
				->references('id')
				->on('products')
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
		Schema::drop('distributor_product');
	}

}

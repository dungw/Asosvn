<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('product_id');
			$table->integer('quantity');
			$table->float('price');
			$table->timestamps();
		});

		Schema::table('order_items', function (Blueprint $table)
		{
			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');

			$table->foreign('product_id')
				->references('id')
				->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}

}

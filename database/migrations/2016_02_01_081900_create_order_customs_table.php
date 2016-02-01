<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCustomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_customs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->mediumText('url');
			$table->integer('quantity');
			$table->float('price');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('order_customs', function (Blueprint $table)
		{
			$table->foreign('order_id')
				->references('id')
				->on('orders')
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
		Schema::drop('order_customs');
	}

}

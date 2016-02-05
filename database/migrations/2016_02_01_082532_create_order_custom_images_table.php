<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCustomImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_custom_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_custom_id')->unsigned();
			$table->string('image');
			$table->timestamps();
		});

		Schema::table('order_custom_images', function (Blueprint $table)
		{
			$table->foreign('order_custom_id')
				->references('id')
				->on('order_customs')
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
		Schema::drop('order_custom_images');
	}

}

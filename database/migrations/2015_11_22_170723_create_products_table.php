<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('sku', 50)->unique()->comment = "Product code";
			$table->integer('brand_id')->unsigned()->comment('Brand ID');
			$table->integer('category_id')->unsigned()->comment('Category ID');
			$table->string('name');
			$table->text('description');
			$table->float('price');
			$table->string('availability', 50)->comment('Ex: available, out of stock...');
			$table->string('condition', 50)->comment('Ex: new, sale-off...');
			$table->integer('quantity');
		});

		Schema::table('products', function (Blueprint $table)
		{
			$table->foreign('brand_id')
				->references('id')
				->on('brands')
				->onDelete('cascade');

			$table->foreign('category_id')
				->references('id')
				->on('categories')
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
		Schema::drop('products');
	}

}

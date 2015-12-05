<?php

use App\Category;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActiveCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->integer('active')->unsigned()->default(Category::STATUS_ACTIVE)->after('order');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->dropColumn('active');
		});
	}

}

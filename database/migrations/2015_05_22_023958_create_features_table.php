<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('features', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name_feature');
			$table->string('description');
			$table->string('url_action');
			$table->string('id_parent');
			$table->integer('module_id')->unsigned();
			$table->foreign('module_id')->references('id')->on('modules');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('features');
	}

}

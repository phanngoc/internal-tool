<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformationDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('information_devices', function (Blueprint $table) {
			$table->increments('id');
			$table->string('contract_number');
			$table->date('buy_date');
			$table->string('distribution');
			$table->string('term_warranty');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('information_devices');
	}

}

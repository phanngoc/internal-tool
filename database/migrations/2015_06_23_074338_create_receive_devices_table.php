<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiveDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('receive_devices', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('employee_id');
			$table->integer('device_id');
			$table->date('receive_date');
			$table->date('return_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('receive_devices');
	}

}

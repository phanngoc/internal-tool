<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('devices', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('line_device_id');
			$table->integer('information_id');
			$table->string('serial_device');
			$table->integer('os_id');
			$table->integer('status_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('devices');
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationDevice extends Model {

	protected $table = 'information_devices';

	protected $fillable = [
		'id',
		'contract_number',
		'buy_date',
		'distribution',
		'term_warranty',
		'created_at',
		'updated_at',
	];


		public function device() {
		return $this->hasMany('App\Device');}

		public static function validate($input, $id = null) {

		$rules = array(
			"contract_number" => "required|min:3|max:255|unique:information_devices,contract_number," . $id,
			"distribution" => "required|min:3|max:255",
			"term_warranty" => "required|min:3|max:255",
			"buy_date"=>"required|date",
		);

		return \Validator::make($input, $rules);
	}
	
}

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
		return $this->hasMany('App\Device');
	}

}

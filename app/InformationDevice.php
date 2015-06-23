<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationDevice extends Model {

	protected $table = 'information_devices';

	protected $fillable = [
		'line_device_id',
		'agreement_number',
		'buy_date',
		'distribution',
		'term_warranty',
		'quantity',
	];

	public function line_device(){
		return $this->belongsTo('App\LineDevice');
	}

}

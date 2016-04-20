<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuschat extends Model {

    protected $primaryKey = 'id';
	protected $table = 'statuschat';

	protected $fillable = [
		'name',
	];
	public function user() {
		return $this->hasMany('App\User','statuschat_id','id');
	}
}

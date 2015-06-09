<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = [
		'fullname',
		'username',
		'password',
		'email',
	];

	public function group() {
		return $this->belongsToMany('\App\Group', 'user_group');
	}
	public function project() {
		return $this->belongsToMany('\App\Group', 'user_project');
	}
	public function attachGroup($groups) {
		if (is_array($groups)) {
			$this->group()->sync($groups);
		} else {
			$this->group()->detach();
		}
	}

}

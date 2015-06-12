<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

 protected $table = 'skills';

 protected $fillable = [
	  'id',
	  'skill',

 ];

 public function employee(){
  return $this->belongsToMany('\App\Employee','employee_skills');
 }

}


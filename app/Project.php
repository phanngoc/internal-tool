<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    protected $fillable = [
        'projectname',
        'description',
        'start_date',
        'end_date',
        'user_id',
        'comments',
        'status_id',
    ];

    public static function validate($input, $id = null) {

        $rules = array(
            'project_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statusprojects,id',
        );

        return \Validator::make($input, $rules);
    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function users() {
        return $this->belongsToMany('\App\User', 'user_project')->select('users.id', 'fullname');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function statusprojects() {
        return $this->belongsTo('App\StatusProject', 'status_id', 'id');
    }

    /**
     * Features 
     * @return [type] [description]
     */
    public function features() {
        return $this->hasMany('App\FeatureProject', 'project_id', 'id');
    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function employees() {
        return $this->belongsToMany('\App\Employee', 'employee_projects', 'project_id', 'employee_id');
    }


}

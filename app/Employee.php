<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Employee extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';
    protected $fillable = [
        'employee_code',
        'firstname',
        'lastname',
        'phone',
        'position_id',
        'avatar',
        'email',
        'nationality',
        'career_objective',
        'address',
        'gender',
        'hobbies',
        'achievement_awards',
        'date_of_birth',
    ];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departments() {
        return $this->belongsTo('App\Position', 'position_id');
    }

    /**
     * One to One relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user() {
        return $this->hasOne('App\User', 'employee_id', 'id');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function working_experiences() {
        return $this->hasMany('App\WorkingExperience', 'employee_id', 'id');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function employee_skills() {
        return $this->hasMany('App\EmployeeSkill', 'employee_id', 'id');
    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function skills() {
        return $this->belongsToMany('App\Skill', 'employee_skills');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function educations() {
        return $this->hasMany('App\Education', 'employee_id', 'id');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationalitys() {
        return $this->belongsTo('App\Nationality', 'nationality', 'id');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function taken_projects() {
        return $this->hasMany('App\TakenProject', 'employee_id', 'id');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function device() {
        return $this->hasMany('App\Device');
    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function interview_schedules() {
        return $this->hasMany('App\InterviewSchedule', 'employee_id', 'id');
    }

    /**
     * [thread description]
     * @return [type] [description]
     */
    public function notify() {
        return $this->hasMany('App\Models\Notify', 'sent_to', 'id');
    }

    /**
     * Many to Many relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function projects() {
        return $this->belongsToMany('App\Project', 'employee_projects');
    }

    /**
     * Get employee current.
     * @return type
     */
    public function empCurrent() {
        return Auth::user()->employee()->first();
    }

    /**
     * 
     * @param type $emloyee_id
     * @return type
     */
    public function listProjectUserBelong() {
        $employee_id = $this->empCurrent()->id;
        return self::find($employee_id)->projects()->get();
    }

}

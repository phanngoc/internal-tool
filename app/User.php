<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = [
        'fullname',
        'username',
        'password',
    ];

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function group() {
        return $this->belongsToMany('\App\Group', 'user_group');
    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function answer() {
        return $this->belongsToMany('\App\PollAnswer', 'poll_user_answers', 'user_id', 'answer_id');
    }

    /**
     * validate
     * @return validator
     */
    public static function validate($input, $id = null) {
        $rules = array(
            'username' => 'required|unique:users,username,' . $id,
        );
        return \Validator::make($input, $rules);
    }

    /**
     * @param  groups array
     */
    public function attachGroup($groups) {
        if (is_array($groups)) {
            $this->group()->sync($groups);
        } else {
            $this->group()->detach();
        }
    }

    /**
     * One to Many relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee() {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }

    /**
     * One to Many relation.
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuschat()
    {
        return $this->belongsTo('App\Models\Statuschat','statuschat_id','id');
    }

    /**
     * Many to Many relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groupchat() 
    {
        return $this->belongsToMany('App\Models\Groupchat', 'groupchat_user', 'user_id', 'group_id');
    }
}

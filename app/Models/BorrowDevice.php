<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowDevice extends Model {

    const BORROW = 1;
    const GRANT = 2;
    const FREE = 3;
    const PENDING = 4;

    protected $table = 'borrow_devices';
    protected $fillable = [
        'device_id',
        'employee_id',
        'note',
        'action',
        'receive_date',
        'return_date'
    ];

    public function employee() {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }

    public function device() {
        return $this->belongsTo('App\Device', 'device_id', 'id');
    }


}

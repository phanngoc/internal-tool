<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowDevice extends Model {

    protected $table = 'borrow_devices';
    protected $fillable = [
        'device_id',
        'employee_id',
        'note',
        'receive_date',
        'return_date'
    ];

    public function author() {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }

}

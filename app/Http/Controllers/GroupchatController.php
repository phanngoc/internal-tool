<?php namespace App\Http\Controllers;

use App\Group;
use App\Language;
use App\Module;
use Auth;
use Route;
use Request;
use App\Employee;

class GroupchatController extends AdminController {

  /**
   * Get current employee.
   * @return [type] [description]
   */
  public function getEmployeeCurrent() {
    return Auth::user()->employee()->first();
  }

	/**
	 * Get current employee.
	 * @return [type] [description]
	 */
	public function pageGroupChat() {
		$employeeId = Auth::user()->employee()->first()->id;
    $allEmployee = Employee::all()->map(function ($item, $key) {
        return array($item->id => $item->lastname.' '.$item->firstname);
    })->toArray();
    
    $dataSelectEmployee = array();
    foreach ($allEmployee as $key => $value) {
      $dataSelectEmployee += $value;
    }
    
    return view('groupchat.groupchat', compact('employeeId', 'dataSelectEmployee'));
	}
}

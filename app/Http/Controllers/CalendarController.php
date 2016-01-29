<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Employee;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\DescriptionSign;
use App\Setting;

class CalendarController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$employees = Employee::all();
		$month = date('m');
		$year = date('Y');
		foreach ($employees as $key => $value) {
			$calendar = Calendar::where('employee_id', '=', $value->id)->where('month',$month)->where('year',$year)->first();
			if($calendar == null)
			{
				$calendar = $this->bornCalendarEmpty($value->id,$month,$year);
			}
			$employees[$key]->calendar = $calendar;
		}

		$func = function($emp) {
		    return $emp->year;
		};
		// Year is stored in database calendar.
		$years = collect(Calendar::all())->map($func);
		$years = array_unique($years->toArray());

		return view('calendar.calendar', compact('employees','month','year','years'));
	}

	/**
	 *  Born calendar empty , to get data without erro
	 * @param  [type] $employee_id [description]
	 * @param  [type] $month       [description]
	 * @param  [type] $year        [description]
	 * @return [type]              [description]
	 */
	public function bornCalendarEmpty($employee_id,$month,$year)
	{
		$calendar = new Calendar;
		$calendar->employee_id = $employee_id;
		$calendar->month = $month;
		$calendar->year = $year;
		$calendar->save();
		return $calendar;
	}

	/**
	 * Ajax get data Timekeeper
	 * @param  [type] $month [description]
	 * @param  [type] $year  [description]
	 * @return [type]        [description]
	 */
	public function api_getTable($month,$year)
	{
		$employees = Employee::all();

		foreach ($employees as $key => $value) {
			$calendar = Calendar::where('employee_id', '=', $value->id)->where('month',$month)->where('year',$year)->first();
			if($calendar == null)
			{
				$calendar = $this->bornCalendarEmpty($value->id,$month,$year);
			}
			$employees[$key]->calendar = $calendar;
		}

?>
       <div id="datafullname" style="display:none"></div>
                <div class="sidebar-calendar">
                  <table>
                    <thead>
                      <tr><th><div class="nameitem">Fullname</div></th></tr>
                    </thead>
                    <tbody>
                        <tr class="itemblank">
                          <td><div class="nameitem"></div></td>
                        </tr>
                      <?php foreach($employees as $key => $value) : ?>
                        <tr>
                          <!-- <td><div class="nameitem">{{ $value->id }}</div></td> -->
                          <td><div class="nameitem" idem="<?php echo $value->id; ?>"><?php echo $value->lastname." ".$value->firstname; ?></div></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div class="content-calendar">
                  <div id="datacalendar" style="display:none"></div>
                  <table>
                    <thead>
                      <tr>
                          <?php
                            for ($i=1;$i<=31;$i++)
                            {
                              echo "<th><div class='day'>Day ".$i."</div></th>";
                            }
                          ?>
                      </tr>
                    </thead>
                    <tbody>
                        <tr class="itemblank">
                          <td><div class="innerblank"></div></td>
                        </tr>
                      <?php
                        foreach($employees as $key => $value)
                        {
                          $calendar = $value->calendar;
                      ?>
                          <tr>
                            <?php
                            for ($i=1;$i<=31;$i++)
                            {
                            ?>
                              <td><div class="item" idem="<?php echo $value->id; ?>" idday="<?php echo $i;?>" ><?php echo $calendar->{'n'.$i};?></div></td>
                            <?php
                            }
                            ?>
                          </tr>
                      <?php
                        }
                      ?>

                    </tbody>
          </table>
     </div>

		<?php
	}

	/**
	 * Save data calendar
	 * @param  [type]  $month   [description]
	 * @param  [type]  $year    [description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function api_saveData($month,$year,Request $request)
	{
		$data = $request->input('data');
		$results = json_decode($data);
		foreach ($results as $key => $value) {
			$calendar = Calendar::where('employee_id','=',$value->idem)->where('month','=',$month)->where('year','=',$year)->first();
			$calendar->{'n'.$value->idday} = $value->data;
			$calendar->save();
		}
	}

	/**
	 * Change count in item description sign.
	 * @param  [type] &$item [description]
	 * @param  [type] $key   [description]
	 * @param  [type] $sign  [description]
	 * @return [type]        [description]
	 */
	public function changeCountDesSign(&$item, $key, $sign) {
		foreach ($item as $key_dS => $val_dS) {
		 	if ($val_dS->sign == $sign) {
		 		if ($item[$key_dS]->count != null) {
		 			$item[$key_dS]->count += 1; 
		 		} else {
		 			$item[$key_dS]->count = 1; 
		 		}
		 	}
		}
	}

	/**
	 * [caculateDayOffLeft description]
	 * @return [type] [description]
	 */
	public function caculateDayOffLeft($desSigns) {
		$countAbsense = 0;
		foreach ($desSigns as $key => $value) {
			if ($value->count != null) {
				if ($value->sign == 'A') {
					$countAbsense += $value->count;
				} else if ($value->sign == 'H') {
					$countAbsense += $value->count * 0.5;
				}
			}	
		}
		return $countAbsense;
	}

	/**
	 * Make variable $desSigns have value.
	 * @param  [type] $desSigns [description]
	 * @return [type]           [description]
	 */
	public function assignDayOffLeft($desSigns) {
		$countDayOff = $this->caculateDayOffLeft($desSigns);
		$dayOffAll = Setting::where('name','count_absent_allow')->first()->value;
		foreach ($desSigns as $key => $value) {
			if ($value->sign == 'L') {
				$desSigns[$key]->count = $dayOffAll - $countDayOff;
			} 
		}
		return $desSigns;
	}

	/**
	 * [getAbsenceInYear description]
	 * @param  Request $request [description]
	 * @param  [type]  $month   [description]
	 * @return [type]           [description]
	 */
	public function getAbsenceInYear(Request $request,$employee_id,$year)
	{
		$desSigns = DescriptionSign::all();

		$emInYear = Calendar::where('year',$year)->where('employee_id',$employee_id)->get();
	
		foreach ($emInYear as $key => $value) {
			for ($i=1; $i<=31; $i++) {
				if ($value->{'n'.$i} != '') {
					array_walk($desSigns,array($this,'changeCountDesSign'),$value->{'n'.$i});
				}
			}
		}
		$desSigns = $this->assignDayOffLeft($desSigns);
		return json_encode($desSigns);
	}

}

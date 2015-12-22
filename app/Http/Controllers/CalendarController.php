<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Employee;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;

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


		return view('calendar.calendar', compact('employees','month','year'));
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

}

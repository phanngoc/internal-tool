<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
	select{
		width: 100%;
	}
	i{
    	cursor:pointer;
	}
</style>

<table class='table table-bordered'>
<thead>
	<tr>
		<th class='text-center'>
			    Skill
		</th>
		<th class='text-center'>
			    Experience (month)
		</th>
		<th class='action'>
		</th>
	</tr>
</thead>
<tbody>
@foreach($employee_skills as $value)
<tr>
	<td>
		{!!Form::select('skill[]',$skill,$value->skill_id,['class'=>'form-control'])!!}
	</td>
	<td >
		{!!Form::input('number','month_experience[]',$value->month_experience,['class'=>'form-control','min'=>'0'])!!}
	</td>
	<td class='action'>
		<i class="fa fa-fw fa-ban delete-skill text-red"></i>
	</td>
</tr>
@endforeach()
</tbody>
</table>



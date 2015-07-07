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
<script type="text/javascript">
$("select").select2({ width: 'resolve'});
	var selectskill=[];
	getOptionSelect();
	function getOptionSelect()
	{
		selectskill=[];
		$('select').children(':selected').each(function() {
			selectskill.push(parseInt($(this).parents("tr").find('select').val()));
	      });
	}
	function disOptionSelect()
	{
		$('select').children(':not(:selected)').each(function() {
		if($.inArray(parseInt($(this).val()),selectskill)>-1)
            $(this).attr('disabled', true);
        else
        	$(this).removeAttr('disabled');
        });
	}
	function addSkill()
	{
		var $newtr=$("<tr>");
		var $newtd1=$("<td>").append('{!!Form::select("skill[]",$skill,null,["class"=>"form-control"])!!}').appendTo($newtr);
		$newtr.append('<td>{!!Form::input("number","month_experience[]",0,["class"=>"form-control","min"=>"0"])!!}</td><td><i class="fa fa-fw fa-plus add-skill text-blue"></i></td>');
		$('tbody').append($newtr)
		disOptionSelect();
		$("select").select2({ width: 'resolve'});
	}

	$(document).on('click', '.add-skill' ,function(){
		if($(this).parents("tr").find('select').val()==="-1"){
			alert("Please select skill!");
			return false;
		}
		if(!$.isNumeric($(this).parents("tr").find('input').val())||$(this).parents("tr").find('input').val()<0){
			alert("Experience is number and larger 0");
			return false;
		}
		selectskill.push(parseInt($(this).parents("tr").find('select').val()));
		$(this).removeClass("fa-plus").removeClass("text-blue").removeClass("add-skill");
		$(this).addClass("fa-ban").addClass("text-red").addClass("delete-skill");
		addSkill();
	});
	$(document).on('change', 'select' ,function(){
		getOptionSelect();
		disOptionSelect();
	});
	$('.btn-save').on('click',function(){
		//$('.add-skill').parents('tr').remove();
	});
	$(document).on('click', '.delete-skill' ,function(){
		$(this).parents('tr').remove();
		var clientIndex = $.inArray(parseInt($(this).parents("tr").find('select').val()), selectskill);
		selectskill.splice(clientIndex, 1);
		disOptionSelect();
	});
	</script>



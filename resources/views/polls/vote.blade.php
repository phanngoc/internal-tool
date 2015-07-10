@extends('layouts.master')
@section('head.title')
{{trans('messages.poll')}}
@stop
@section('head.css')
@stop
@section('body.content')
<style type="text/css">

</style>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
 <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			{{trans('messages.list_poll')}}
		</h1>
		<ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('polls.index') }}">{{trans('messages.poll')}}</a></li>
            <li class="active">{{trans('messages.list_poll')}}</li>
        </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{{trans('messages.list_poll')}}</h3>
					</div>
					<div class="box-body">
<div class="polls form ng-scope" id="poll-container" ng-app="poll">
<div poll-id="'558eae00-7d70-4594-aa60-3336c0b92925'" ng-include="getTemplate()"><div class="well ng-scope">
<h4 class="ng-binding">{{$poll->question}}</h4>
<p><em class="ng-binding"></em></p>
<!-- <form action="#" class="form-horizontal ng-pristine ng-valid ng-valid-required" name="myForm" id="PollViewForm" method="post" accept-charset="utf-8"> -->
{!!Form::open(['method'=>'post','class'=>'form-horizontal ng-pristine ng-valid ng-valid-required'])!!}
    <table class="table">
        <tbody><!-- ngRepeat: answer in answers -->
            @foreach($poll->answers as $answer)
            <tr class="ng-scope" ng-repeat="answer in answers">
                <td nowrap="" width="1%">
                    @if($poll->num_select>1)
                    {!!Form::checkbox('answer[]',$answer->id,null,['class'=>'answer','id'=>'answer-'.$answer->id])!!}
                    @else
                    {!!Form::radio('answer[]',$answer->id,null,['class'=>'answer','id'=>'answer-'.$answer->id])!!}
                    @endif
                </td>
                <td>
                    <label class="ng-binding" style="color:#{{$answer->color}}" for="answer-{{$answer->id}}">{{$answer->answer}}</label>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
    <p>
        <input class="btn btn-primary"  value="Vote →" type="submit">
    </p>
    {!!Form::close()!!}
<!-- </form> -->
</div></div>
</div>
					</div> <!-- end body -->
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
    $('.answer').on('change',function(){
        if($('input[type="checkbox"]:checked').length>{{$poll->num_select}}&&{{$poll->num_select}}>1){
            this.checked=!this.checked;
            alert("You cannot vote for more then {{$poll->num_select}} options at once.");
        }
    })
</script>
@stop
@section('body.js')
@stop
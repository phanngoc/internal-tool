@extends('layouts.master')
@section('head.title')
{{trans('messages.poll')}}
@stop
@section('head.css')
<style type="text/css">
	th{
		text-align: center;
	}
	.table-poll .showtext{
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

</style>
@stop
@section('body.content')
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
						<table class="table table-bordered table-striped table-poll" id="table-poll">
							<thead>
								<th width="5%">#</th>
								<th width="40%">Question</th>
								<th>Active</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Total Vote</th>
								<th>{!!trans('messages.action')!!}</th>
							</thead>
							<tbody>
								{{--*/ $number=0 /*--}}
								@foreach($polls as $poll)
								<tr>
								<td class='text-center'>{{++$number}}</td>
								<td style=""><p class="showtext">{{$poll->question}}</div></td>
								<td class='text-center'>
									{!!Form::checkbox('active', 1, $poll->active,['disabled'=>'disabled'])!!}
								</td>
								<td>
									{{$poll->start_date}}
								</td>
								<td>
									{{$poll->end_date}}
								</td>
								<td>
									{{$poll->total_vote}}
								</td>
								<td>
									<a href="{{ route('polls.show', $poll->id)}}" class="text-blue" title="Edit">
		                              <i class="fa fa-fw fa-edit"></i>
		                          	</a>
		                          	<a href="{{ route('polls.destroy', $poll->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
		                              <i class="fa fa-fw fa-ban"></i>
		                          </a>
								</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$(function () {
        $('#table-poll').dataTable({
          "bLengthChange": false,
          "bSort": true,
        });
      });
</script>
@stop
@section('body.js')
@stop
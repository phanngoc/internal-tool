@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_poll')}}
@stop
@section ('head.css')
<style type="text/css">
    .new_answer{
        width: 100%;
    }
    .new_order{
        width:50px;
    }
    table{
        border: 0px;
    }
    td{
        text-align: center;
        padding: 10px 2px 10px 2px;
    }
    th{
        text-align: center;
    }
    .table-answer
    {
        width:60%;
        /* border: 1px solid; */
    }
    .color
    {
        width:100%;
    }
    i{
        cursor:pointer;
    }
    .check{
        position: absolute;

    }
    .input-group {
        width: 230px;
    }



</style>
@stop
@section ('body.content')
<script type="text/javascript" src="{{asset('jscolor/jscolor.js')}}"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.poll_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.poll')}}</a></li>
            <li class="active">{{trans('messages.add_poll')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.edit_poll')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('polls.index') !!}">{{trans('messages.list_poll')}}</i></a>
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{trans('messages.whoop')}}</strong> {{trans('messages.problem')}}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- form start -->
	                {!! Form::model($poll, ['route' => ['polls.update', $poll->id], 'method' => 'put']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for='question'>{{trans('messages.question')}}<span id="label">*</span></label>
                            {!!Form::text('question',null,['id'=>'quesion','class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            <fieldset>
                              <legend>Answers</legend>
                              <div>
                                <table class='table-answer' border="1px">
                                <thead>
                                    <tr>
                                        <th style='width: 5%'>#</th>
                                        <th style='width: 60%'>
                                            Answer
                                        </th>
                                        <th style='width: 15%'>
                                            Order
                                        </th>
                                        <th style='width: 13%'>
                                            Color
                                        </th>
                                        <th class='action'>
                                            {{trans('messages.action')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    	{{--*/ $number=0 /*--}}
                                    	@foreach($answers as $answer)
                                    	<tr>
	                                        <td>{{++$number}}</td>
	                                        <td>{!!Form::text('answer[]',$answer->answer,['class'=>'new_answer'])!!}</td>
	                                        <td>{!!Form::input('number','order[]',$answer->order,['class'=>'new_order number','min'=>'0'])!!}</td>
	                                        <td>{!!Form::input('text','color[]',$answer->color,['class'=>'color'])!!}</td>
	                                        <td><i class="fa fa-fw fa-ban delete-answer text-red"></i></td>
                                        </tr>
                                        @endforeach()
                                </tbody>
                            </table>
                              </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                              <legend>Poll Parameters</legend>
                                <div class="form-group">
                                        <label for="active">Active&nbsp;</label>
                                            {!! Form::checkbox('active',1,null, ['id'=>'active','class'=>'check']) !!}
                                </div>

                                <div class="form-group">
                                    <label for ="start_date">Start Date&nbsp;</label>
                                    <div class="input-group date" id="datetimepicker1" class="datetimepicker">
                                        <input type="text" class="form-control input-text" name="start_date" id="start_date" value="{{$poll->start_date}}"/>  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for ="start_date">End Date&nbsp;</label>
                                    <div class="input-group date" id="datetimepicker2" class="datetimepicker">
                                        <input type="text" class="form-control input-text" name="end_date" id="end_date" value="{{$poll->end_date}}" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="votes_per_day">Votes per day&nbsp;</label>
                                            {!! Form::input('number','votes_per_day',null, ['id'=>'votes_per_day','class'=>'input-number','min'=>'0','required'=>'true']) !!}
                                </div>

                                <div class="form-group">
                                        <label for="num_select">How many options can be selected at once?&nbsp;</label>
                                            {!! Form::input('number','num_select',null, ['id'=>'num_select','class'=>'input-number','min'=>'0','required'=>'true']) !!}
                                </div>

                                <div class="form-group">
                                        <label for="show_results">Show Results&nbsp;</label>
                                            {!! Form::checkbox('show_results',1,null, ['id'=>'show_results','class'=>'check']) !!}
                                </div>

                                <div class="form-group">
                                        <label for="show_results_req_vote">Require vote to see results&nbsp;</label>
                                            {!! Form::checkbox('show_results_req_vote',1,null, ['id'=>'show_results_req_vote','class'=>'check']) !!}
                                </div>

                                <div class="form-group">
                                        <label for="show_results_finish">Show poll when finished based on end date?&nbsp;</label>
                                            {!! Form::checkbox('show_results_finish',1,null, ['id'=>'show_results_finish','class'=>'check']) !!}
                                </div>

                                <div class="form-group">
                                        <label for="show_vote_number">Show number of votes&nbsp;</label>
                                            {!! Form::checkbox('show_vote_number',1,null, ['id'=>'show_vote_number','class'=>'check']) !!}
                                </div>
                                
                                <div class="form-group">
                                        <label for="result_precision">Result Decimal Precision&nbsp;</label>
                                            {!! Form::checkbox('result_precision','1',null, ['id'=>'result_precision','class'=>'check']) !!}
                                </div>

                              <div>
                              </div>
                          </fieldset>
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <input type="submit" class="btn btn-primary" value="Save"></input>
                                    <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{asset('datepicker/js/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datetimepicker.css')}}">


    <script type="text/javascript">
    addanswer('#'+Math.floor(Math.random()*16777215).toString(16));
    var number=1;
    function addanswer(color)
    {
        $(".fa-plus").removeClass("fa-plus")
        .removeClass("text-blue")
        .removeClass("add-answer")
        .addClass("fa-ban delete-answer text-red");
        var $newtr=$("<tr>").append("<td></td>");
        var $newtd1=$("<td>").append('{!!Form::text("answer[]",null,["class"=>"new_answer"])!!}').appendTo($newtr);
        $newtr.append('<td>{!!Form::input("number","order[]",0,["class"=>"new_order","min"=>"0"])!!}</td>');
        $newtr.append('<td><input class="color" name="color[]" type="text" value="'+color+'"></td>');
        $newtr.append('<td><i class="fa fa-fw fa-plus add-answer text-blue"></i></td>');
        $('tbody').append($newtr);
        loadnumber();
    }
    function loadnumber()
    {
        $.each($('.table-answer tbody tr '),function(index,value){
            $(this).children('td:nth-child(1)').text(index+1);
        });
    }
    $(document).on('click','.add-answer',function(){
        addanswer('#'+Math.floor(Math.random()*16777215).toString(16));
        jscolor.init();
    })
    .on('click','.delete-answer',function(){
        $(this).parents('tr').remove();
        loadnumber();
    })
    .on('keypress','input[type="number"]',function(e) {
        if(e.which < 48 || 57 < e.which )
            e.preventDefault();
    });

    $(function(){
        $('#datetimepicker1').datetimepicker({
            'format' : 'YYYY-MM-DD hh:mm:ss',
            sideBySide: true
        });
        $('#datetimepicker2').datetimepicker({
            'format' : 'YYYY-MM-DD hh:mm:ss',
            sideBySide: true,
            useCurrent: false
        });
        $("#datetimepicker1").on("dp.change", function (e) {
            $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker2").on("dp.change", function (e) {
            $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
        });
    });
    </script>

</div>
@stop

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
        margin: 0px 0px 0px 10px;

    }
    label{
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
                        <h3 class="box-title">{{trans('messages.add_poll')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('users.index') !!}">{{trans('messages.list_poll')}}</i></a>
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
                    {!! Form::open([
                    'route'=>['polls.store'],
                    'method'=>'POST',
                    'id'=>'add'
                    ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for='question'>trans('messages.question')<span id="label">*</span></label>
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
                                    <tr>
                                        <td>1</td>
                                        <td>{!!Form::text('answer[]',null,['class'=>'new_answer'])!!}</td>
                                        <td>{!!Form::input('number','order[]',0,['class'=>'new_order','min'=>'0'])!!}</td>
                                        <td>{!!Form::input('text','color[]','005fbf',['class'=>'color'])!!}</td>
                                        <td><i class="fa fa-fw fa-plus add-answer text-blue"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                              </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                              <legend>Poll Parameters</legend>
                                <div class="form-group">
                                        <label>Active
                                            {!! Form::checkbox('active','',false, ['class'=>'check']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Start Date
                                            {!! Form::text('start_date','', ['class'=>'input-text']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>End Date
                                            {!! Form::text('end_date','', ['class'=>'input-text']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Votes per day
                                            {!! Form::input('number','votes_per_day',0, ['class'=>'input-number','min'=>'0','required'=>'true']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Total votes per person
                                            {!! Form::input('number','total_votes_per_person',0, ['class'=>'input-number','min'=>'0','required'=>'true']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>How many options can be selected at once?:
                                            {!! Form::input('number','num_select',0, ['class'=>'input-number','min'=>'0','required'=>'true']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Show Results
                                            {!! Form::checkbox('show_results','',false, ['class'=>'check']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Require vote to see results:
                                            {!! Form::checkbox('show_results_req_vote','',false, ['class'=>'check']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Show poll when finished based on end date?:
                                            {!! Form::checkbox('show_results_finish','',false, ['class'=>'check']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Show number of votes:
                                            {!! Form::checkbox('show_vote_number','',false, ['class'=>'check']) !!}
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label>Result Decimal Precision:
                                            {!! Form::checkbox('result_precision','',false, ['class'=>'check']) !!}
                                        </label>
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
    <script type="text/javascript">
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
    }
    function loadnumber()
    {
        $.each($('.table-answer tbody tr '),function(index,value){
            $(this).children('td:nth-child(1)').text(index+1);
        });
    }
    $(document).on('click','.add-answer',function(){
        addanswer('#'+Math.floor(Math.random()*16777215).toString(16));
        loadnumber();
        jscolor.init();
    })
    .on('click','.delete-answer',function(){
        $(this).parents('tr').remove();
        loadnumber();
    });
    </script>

</div>
@stop
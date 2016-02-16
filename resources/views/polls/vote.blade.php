@extends('layouts.master')
@section('head.title')
{{trans('messages.poll')}}
@stop
@section('head.css')
@stop
@section('body.content')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<link href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{Asset('chartjs/Chart.js')}}"></script>

<style type="text/css">
    .not-allow {
        border-radius: 12px;
        padding : 20px;
        font-size: 19px;
    }
    .header h4 {
        font-size: 21px;
        font-weight: 800;
        padding: 5px;
        background-color: rgb(225, 225, 188);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-top: 1px solid rgb(119, 133, 143);
        -webkit-box-shadow: 0px 1px 0px 1px #E6E6E6;
        -moz-box-shadow: 0px 1px 0px 1px #E6E6E6;
        box-shadow: 0px 1px 0px 1px #E6E6E6;
    }
</style>

<div class="content-wrapper">
	<section class="content-header">
<!-- 		<h1>
			{{trans('messages.list_poll')}}
		</h1> -->
		<ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li><a href="{{ route('polls.index') }}">{{trans('messages.poll')}}</a></li>
      <li class="active">{{trans('messages.vote')}}</li>
    </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{{trans('messages.vote')}}</h3>
					</div>
					<div class="box-body">
                  @if (session('showResultAfterVote') || ($checkExcessDeadline && $isShowResultAfterDealine) || ($checkUserVoted && $isShowResultAfterVote))
                    <div class="result" @if ($isShowResultAfterVote) class="hidden" @endif>
                        <div class="header">
                            <h4>This is a result</h4>
                        </div>
                        <div class="body">
                            <canvas height="204" width="409" style="width: 409px; height: 204px;" id="myChart"></canvas>
                        </div>
                        @if ($showVoteNumber)
                            <span>Total vote : {{$countVote}}</span>
                        @endif
                    </div>
                  @endif

                  <script type="text/javascript">

                      if ({{$isShowResultAfterVote}}) {
                        $('form#formAnswer').submit(function(){
                          $('div.result').show();
                        });
                      }
                      var ctx = document.getElementById("myChart").getContext("2d");
                      var options = {
                          //Boolean - Whether we should show a stroke on each segment
                          segmentShowStroke : true,
                          //String - The colour of each segment stroke
                          segmentStrokeColor : "#fff",
                          //Number - The width of each segment stroke
                          segmentStrokeWidth : 2,
                          //Number - The percentage of the chart that we cut out of the middle
                          percentageInnerCutout : 50, // This is 0 for Pie charts
                          //Number - Amount of animation steps
                          animationSteps : 100,
                          //String - Animation easing effect
                          animationEasing : "easeOutBounce",
                          //Boolean - Whether we animate the rotation of the Doughnut
                          animateRotate : true,
                          //Boolean - Whether we animate scaling the Doughnut from the centre
                          animateScale : false,
                          //String - A legend template
                          legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

                      };
                      <?php
                          function convertArrayToJsonString($votechart) {
                              echo '[';
                              foreach ($votechart as $key => $value) {
                                  echo '{';
                                  echo   '"value" : "'.$value->value.'",';
                                  echo   '"color" : "'.$value->color.'",';
                                  echo   '"highlight" : "'.$value->highlight.'",';
                                  echo   '"label" : "'.$value->label.'"';
                                  if ($key == count($votechart)-1) {
                                      echo '}';
                                  }
                                  else {
                                      echo '},';
                                  }
                              }
                              echo ']';
                          }
                      ?>
                      var data = jQuery.parseJSON('<?php convertArrayToJsonString($votechart);?>');
                          // For a pie chart
                      var myPieChart = new Chart(ctx).Pie(data,options);
                  </script>

              <?php
                  $isShowForm = is_null(session('showResultAfterVote')) ? true : !session('showResultAfterVote');
              ?>

              @if ($countAnswerInDay >= $poll->votes_per_day)
                  <div class="not-allow alert-danger">
                    Exceed number answer in day.
                  </div>
              @elseif ($checkExcessDeadline)
                <div class="not-allow alert-danger">
                  The time is over
                </div>
              @elseif ($checkUserVoted)
                  <div class="not-allow alert-danger">
                    You voted before.
                  </div>
              @elseif ($isShowForm)
              <div class="polls form ng-scope" id="poll-container" ng-app="poll">
                  <div poll-id="'558eae00-7d70-4594-aa60-3336c0b92925'" ng-include="getTemplate()">
                    <div class="well ng-scope">
                      <h4 class="ng-binding">{{$poll->question}}</h4>
                      <p><em class="ng-binding"></em></p>
                      <!-- <form action="#" class="form-horizontal ng-pristine ng-valid ng-valid-required" name="myForm" id="PollViewForm" method="post" accept-charset="utf-8"> -->
                          {!!Form::open(['url'=> route('savevote',$poll->id),'method'=>'post','class'=>'form-horizontal ng-pristine ng-valid ng-valid-required','id'=>'formAnswer'])!!}
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
                      </div>
                  </div>
              </div> <!-- .polls -->
              @else
                <div class="alert alert-success">
                  Thank you for your vote.
                </div>
              @endif
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

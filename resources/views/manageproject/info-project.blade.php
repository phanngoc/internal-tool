@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section('body.content')

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery-1.4.2.js') }}"></script>

  <script type="text/javascript" src="{{ Asset('jqueryganttview/date.js') }}"></script>

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery-ui-1.8.4.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jqueryganttview/jquery-ui-1.8.4.css') }}" />

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery.ganttView.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jqueryganttview/jquery.ganttView.css') }}" />

  <script type="text/javascript" src="{!! Asset('treegrid/jquery-1.11.3.js') !!}"></script>

  <script type="text/javascript" src="{!! Asset('json2/json2.js') !!}"></script>

  <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
  <link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="{{Asset('handlebars-v3.0.3.js')}}"></script>
  <script src="{{ Asset('chartjs/Chart.js') }}"></script>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      {{trans('messages.project_management')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li class="active">{{trans('manageproject.list_detail_feature')}}</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">{{trans('manageproject.overview_project')}}</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">

                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">{{trans('manageproject.issue_tracking')}}</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="progress-group">
                      <span class="progress-text">Task</span>
                      <span class="progress-number"><b>{{$numTaskNoClosed}}</b>/{{$numTaskAll}}</span>
                      <?php
                        $percentTask = ($numTaskAll == 0) ? 0 : ceil($numTaskNoClosed/$numTaskAll * 100);
                      ?>
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: {{$percentTask}}%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Bug</span>
                      <span class="progress-number"><b>{{$numBugNoClosed}}</b>/{{$numBugAll}}</span>
                      <?php
                        $percentBug = ($numBugAll == 0) ? 0 : ceil($numBugNoClosed/$numBugAll * 100);
                      ?>
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-red" style="width: {{$percentBug}}%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Done</span>
                      <span class="progress-number"><b>{{$percentDone}}</b>/100</span>

                      <div class="progress sm">
                        <div class="progress-bar progress-bar-green" style="width: {{$percentDone}}%"></div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                      <a href="{{ route('manageproject.index', $project->id) }}" class="uppercase">{{ trans('manageproject.view_all_issue') }}</a>
                  </div>
                </div>

                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('manageproject.status_chart') }}</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <canvas id="pieChart" style="height: 260px; width: 521px;" width="521" height="260"></canvas>
                      <script type="text/javascript">
                        //-------------
                        //- PIE CHART -
                        //-------------
                        // Get context with jQuery - using jQuery's .get() method.
                        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                        var pieChart = new Chart(pieChartCanvas);
                        var arrColor = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

                        var PieData = [
                          <?php
                          foreach ($countStatus as $key => $itemStatus) {
                            ?>
                            {
                              value: {{$itemStatus->countstatus}},
                              color: arrColor[{{ $key }}],
                              highlight: arrColor[{{ $key }}],
                              label: "{{$itemStatus->label}}"
                            },
                            <?php
                          }
                          ?>
                        ];
                        var pieOptions = {
                          //Boolean - Whether we should show a stroke on each segment
                          segmentShowStroke: true,
                          //String - The colour of each segment stroke
                          segmentStrokeColor: "#fff",
                          //Number - The width of each segment stroke
                          segmentStrokeWidth: 2,
                          //Number - The percentage of the chart that we cut out of the middle
                          percentageInnerCutout: 50, // This is 0 for Pie charts
                          //Number - Amount of animation steps
                          animationSteps: 100,
                          //String - Animation easing effect
                          animationEasing: "easeOutBounce",
                          //Boolean - Whether we animate the rotation of the Doughnut
                          animateRotate: true,
                          //Boolean - Whether we animate scaling the Doughnut from the centre
                          animateScale: false,
                          //Boolean - whether to make the chart responsive to window resizing
                          responsive: true,
                          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                          maintainAspectRatio: true,
                          //String - A legend template
                          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                        };
                        //Create pie or douhnut chart
                        // You can switch between pie and douhnut using the method below.
                        pieChart.Doughnut(PieData, pieOptions);
                      </script>
                    </div><!-- /.box-body -->
                  </div> <!-- /.box box-danger -->

                </div> <!-- .col-md-6 -->
                <div class="col-md-6">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Members</h3>

                      <div class="box-tools pull-right">
                        <span class="label label-danger">{{ count($project->employees) }} Members</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach ($project->employees as $employee)
                          <li>
                            <img src="{{ asset($employee->avatar) }}" alt="User Image">
                            <a class="users-list-name" href="#">{{ $employee->lastname.' '.$employee->firstname }}</a>
                            <span class="users-list-date">
                              <?php
                                $groups = $employee->user->group;
                                if (count($groups) > 0) {
                                  ?>
                                  <p>{{ $groups[0]->groupname }}</p>
                                  <?php
                                }
                              ?>
                                  
                            </span>
                          </li>
                        @endforeach
                      </ul>
                      <!-- /.users-list -->
                    </div> <!-- .box-body no-padding -->
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript:void(0)" class="uppercase">View All Users</a>
                    </div>
                  <!-- /.box-footer -->
                </div> <!-- /.box-danger -->

                <!-- Box bar chart -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="barChart" style="height: 225px; width: 501px;" width="501" height="225"></canvas>
                      <script type="text/javascript">
                        var areaChartData = {
                          labels: [
                          <?php
                            foreach ($countIssueNotClosed as $key => $issueNotClosed) {
                              ?>
                              "{{substr($issueNotClosed->timeissue,0,4).'-'.substr($issueNotClosed->timeissue,4,2)}}",
                              <?php
                            }
                          ?>
                          ],
                          datasets: [
                            {
                              label: "Electronics",
                              fillColor: "rgba(210, 214, 222, 1)",
                              strokeColor: "rgba(210, 214, 222, 1)",
                              pointColor: "rgba(210, 214, 222, 1)",
                              pointStrokeColor: "#c1c7d1",
                              pointHighlightFill: "#fff",
                              pointHighlightStroke: "rgba(220,220,220,1)",
                              data: [
                                <?php
                                  foreach ($countIssueClosed as $key => $issueClosed) {
                                    ?>
                                    {{$issueClosed->countissue}},
                                    <?php
                                  }
                                ?>
                              ]
                            },
                            {
                              label: "Digital Goods",
                              fillColor: "rgba(60,141,188,0.9)",
                              strokeColor: "rgba(60,141,188,0.8)",
                              pointColor: "#3b8bba",
                              pointStrokeColor: "rgba(60,141,188,1)",
                              pointHighlightFill: "#fff",
                              pointHighlightStroke: "rgba(60,141,188,1)",
                              data: [
                                <?php
                                  foreach ($countIssueNotClosed as $key => $issueNotClosed) {
                                    ?>
                                    {{$issueNotClosed->countissue}},
                                    <?php
                                  }
                                ?>
                              ]
                            }
                          ]
                        };

                        //-------------
                        //- BAR CHART -
                        //-------------
                        var barChartCanvas = $("#barChart").get(0).getContext("2d");
                        var barChart = new Chart(barChartCanvas);
                        var barChartData = areaChartData;
                        barChartData.datasets[1].fillColor = "#00a65a";
                        barChartData.datasets[1].strokeColor = "#00a65a";
                        barChartData.datasets[1].pointColor = "#00a65a";
                        var barChartOptions = {
                          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                          scaleBeginAtZero: true,
                          //Boolean - Whether grid lines are shown across the chart
                          scaleShowGridLines: true,
                          //String - Colour of the grid lines
                          scaleGridLineColor: "rgba(0,0,0,.05)",
                          //Number - Width of the grid lines
                          scaleGridLineWidth: 1,
                          //Boolean - Whether to show horizontal lines (except X axis)
                          scaleShowHorizontalLines: true,
                          //Boolean - Whether to show vertical lines (except Y axis)
                          scaleShowVerticalLines: true,
                          //Boolean - If there is a stroke on each bar
                          barShowStroke: true,
                          //Number - Pixel width of the bar stroke
                          barStrokeWidth: 2,
                          //Number - Spacing between each of the X value sets
                          barValueSpacing: 5,
                          //Number - Spacing between data sets within X values
                          barDatasetSpacing: 1,
                          //String - A legend template
                          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                          //Boolean - whether to make the chart responsive
                          responsive: true,
                          maintainAspectRatio: true
                        };

                        barChartOptions.datasetFill = false;
                        barChart.Bar(barChartData, barChartOptions);
                      </script>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /Box bar chart-->


              </div> <!-- .col-md-6 -->
            </div> <!-- .row -->
          </div><!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
</div> <!-- .content-wrapper -->

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<style type="text/css">
  .create-project {
    display: block;
    width: 146px;
    margin-top: 15px;
  }

  .users-list img{
    width: 65px;
    height: 65px !important;
  }
</style>


<link rel="stylesheet" href="{{ Asset('jquery-ui/1.11.4/jquery-ui.css') }}">
<script src="{{ Asset('jquery-ui/1.11.4/jquery-ui.js') }}"></script>

@stop

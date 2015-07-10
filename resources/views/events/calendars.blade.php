@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>

  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-timepicker/jquery.timepicker.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-timepicker/jquery.timepicker.js') }}"></script>

  <link href="http://fullcalendar.io/js/fullcalendar-2.3.2/fullcalendar.css" rel="stylesheet">
  <link href="http://fullcalendar.io/js/fullcalendar-2.3.2/fullcalendar.print.css" rel="stylesheet" media="print">
  <script src="{{ Asset('fullcalendar/moment.min.js') }}"></script>
  <script src="{{ Asset('fullcalendar/jquery.min.js') }}"></script>
  <script src="{{ Asset('fullcalendar/fullcalendar.min.js') }}"></script>
  
@stop



@section ('body.content')

<script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: '2015-02-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2015-02-01'
        },
        {
          title: 'Long Event',
          start: '2015-02-07',
          end: '2015-02-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2015-02-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2015-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2015-02-11',
          end: '2015-02-13'
        },
        {
          title: 'Meeting',
          start: '2015-02-12T10:30:00',
          end: '2015-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2015-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2015-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2015-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2015-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2015-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2015-02-28'
        }
      ]
    });
    
  });

</script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

 

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
          <h1>
            {{trans('messages.candidate_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('candidate.interview') }}">{{trans('messages.interview')}}</a></li>
            <li class="active">{{trans('messages.list_interview')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_interview')}}</h3>
                    </div>
                    <div class="row">
                      
                    </div>
                    <div class="box-body">
                        <div id="calendar" >
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


@stop



@section ('body.js')


@stop

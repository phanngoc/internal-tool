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

  <script src="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.css') }}" type="text/css" />
  
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
      dayClick: function(date, jsEvent, view) {
         console.log(date);
         console.log(jsEvent);
         console.log(view);
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
    

    $('.date_start').datepicker({format : 'yyyy-mm-dd'});
    $('.date_end').datepicker({format : 'yyyy-mm-dd'});
    $('.saveaddevent').click(function(){
       var title = $('#myModal').find('input[name="title"]').val();
       var date_start = $('#myModal').find('input[name="date_start"]').val();
       var date_end = $('#myModal').find('input[name="date_end"]').val();
       var eventobj = {id : 5 , title : title , start : date_start , end : date_end};
       $('#calendar').fullCalendar( 'renderEvent', eventobj ,true );
       $('#myModal').modal('hide');
    });
    $('.cancel').click(function(){
       $('#myModal').modal('hide');
    });
  });

</script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Event</h4>
        </div>

        <div class="modal-body">
         <div class="inner">
              <div class="form-group">
                <label>Title</label>
                <input name="title" class="form-control" />
              </div>
              <div class="form-group">
                <label>Date Start</label>
                <input name="date_start" class="form-control date_start" />
              </div>
              <div class="form-group">
                <label>Date End</label>
                <input name="date_end" class="form-control date_end" /> 
              </div>
          </div><!-- .inner -->
        </div>

        <div class="modal-footer">
          <div class="row">
              <button class="btn btn-primary saveaddevent">Save</button>
              <button class="btn btn-primary cancel">Cancel</button>
          </div>
        </div>

      </div>
    </div>
  </div>
<!-- end Modal -->

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
          <h1>
            {{trans('messages.event_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('events.index') }}">{{trans('messages.event_manager')}}</a></li>
            <li class="active">{{trans('messages.schedule_event')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.schedule_event')}}</h3>
                    </div>
                    <div class="row">
                       <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left:25px">Create Event</button>
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

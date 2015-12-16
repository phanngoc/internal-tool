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
  <script src="{{ Asset('fullcalendar/fullcalendar.js') }}"></script>

  <script src="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.css') }}" type="text/css" />
  
  <script type="text/javascript" src="{{ Asset('notifyjs/notify.js') }}"></script>

@stop



@section ('body.content')

<script>

  $(document).ready(function() {

    function resetModalCreate()
    {
       $('#myModal').find('input[name="title"]').val('');
       $('#myModal').find('input[name="date_start"]').val('');
       $('#myModal').find('input[name="date_end"]').val('');
    }

    function resetModalUpdate()
    {
       $('#updateModal').find('input[name="id"]').val('');
       $('#updateModal').find('input[name="title"]').val('');
       $('#updateModal').find('input[name="date_start"]').val('');
       $('#updateModal').find('input[name="date_end"]').val('');
    }

    function setValueModalUpdate(id,title,date_start,date_end)
    {
       $('#updateModal').find('input[name="id"]').val(id);
       $('#updateModal').find('input[name="title"]').val(title);
       $('#updateModal').find('input[name="date_start"]').val(date_start);
       $('#updateModal').find('input[name="date_end"]').val(date_end);
    }

    function isFunction(functionToCheck) {
      var getType = {};
      return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
    }

    function pushDataToServe(func)
    {
       var data = $('#calendar').fullCalendar('clientEvents');
       var datarequest = [];
       $.each(data,function(key,value){
          var item = {};
          item.id = value.id;
          item.title = value.title;
          item.start = value.start._i;
          item.end = (value.end == null ) ? null : value.end._i;
          datarequest.push(item);
       });
       
       $.ajax({
         url : '{{ route("events.store") }}',
         method : 'POST',
         data : { data : datarequest , _token :"{{ csrf_token() }}" }
       }).done(function(response){
          console.log(response);
          if (isFunction(func)) {
            func();  
          }
       });
    }

    var event_json = '<?php echo $event_json; ?>';
    var events = jQuery.parseJSON(event_json);
    

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      dayClick: function(date, jsEvent, view) {
         // console.log(date);
         // console.log(jsEvent);
         // console.log(view);
      },
      eventClick: function(calEvent, jsEvent, view) {
        console.log(calEvent);
        console.log(jsEvent);
        console.log(view);
        setValueModalUpdate(calEvent.id,calEvent.title,calEvent.start._i,calEvent.end._i);
        $('#updateModal').modal('show');
      },
      eventDrop: function(event, delta, revertFunc) {
        console.log(event.title + " was dropped on " + event.start.format() + "|" + event.end.format());
        console.log(event.start);
        // event._start = moment(event.start.format());
        // event._end = moment(event.end.format());
        // event.start = moment(event.start.format());
        // event.end = moment(event.end.format());
        // console.log(event.start);
        // console.log(event.end);
        // console.log(event);
        $('#calendar').fullCalendar('updateEvent', event, true);
      },
      eventReceive: function(event) {
        console.log(event);
      },
      defaultDate: '2015-02-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: events,
    });

    $('.date_start').datepicker({format : 'yyyy-mm-dd'});
    $('.date_end').datepicker({format : 'yyyy-mm-dd'});

    /* save and cancel add event */
    $('.saveAddEvent').click(function(){
       var title = $('#myModal').find('input[name="title"]').val();
       var date_start = $('#myModal').find('input[name="date_start"]').val();
       var date_end = $('#myModal').find('input[name="date_end"]').val();
       var eventobj = {id : 0 , title : title , start : date_start , end : date_end};
       $('#calendar').fullCalendar( 'renderEvent', eventobj ,true );
       $('#myModal').modal('hide');
       pushDataToServe();
    });

    $('.cancelAddModal').click(function(){
       $('#myModal').modal('hide');
    });
    /* save and cancel add event */


    /* save and cancel edit event */
    $('.saveUpdateEvent').click(function(){
        var result = {};
        result.id = $('#updateModal').find('input[name="id"]').val();
        result.start = $('#updateModal').find('input[name="date_start"]').val();
        result.end = $('#updateModal').find('input[name="date_end"]').val();
        result.title = $('#updateModal').find('input[name="title"]').val();
        console.log(result);
        $('#calendar').fullCalendar( 'removeEvents', result.id);
        $('#calendar').fullCalendar( 'renderEvent', result ,true );
        $('#updateModal').modal('hide');
        pushDataToServe();
    });

    $('.cancelUpdateEvent').click(function(){
       $('#updateModal').modal('hide');
    });
    /* save and cancel edit event */

    /* delete event */
    $('.deleteEvent').click(function(){
        $('#calendar').fullCalendar( 'removeEvents', $('#updateModal').find('input[name="id"]').val());
        $('#updateModal').modal('hide');
    });

    var notifySaveEvent = function () {
        $("#save_all_event").notify(
          "Save event successfully", "success",
          { position:"right" }
        );
    }

    $('#save_all_event').click(function(){
        var data = $('#calendar').fullCalendar('clientEvents');
        console.log(data);
        pushDataToServe(notifySaveEvent);
    });

  });

</script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- Modal Update-->
  <div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="margin-top:195px">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Event</h4>
        </div>

        <div class="modal-body">
         <div class="inner">
              <input type="hidden" name="id" />
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
              <button class="btn btn-primary saveUpdateEvent">Save</button>
              <button class="btn btn-danger deleteEvent">Delete</button>
              <button class="btn btn-primary cancelUpdateEvent">Cancel</button>
          </div>
        </div>

      </div>
    </div>
  </div>
<!-- end Modal -->



<!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="margin-top:195px">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Event</h4>
        </div>

        <div class="modal-body">
         <div class="inner">
              <input type="hidden" name="id" />
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
              <button class="btn btn-primary saveAddEvent">Save</button>
              <button class="btn btn-primary cancelAddModal">Cancel</button>
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
                       <button class="btn btn-primary" style="margin-right:25px" id="save_all_event">Save All Event</button>
                    </div>

                    <div class="box-body">
                        <div id="calendar" >
                        </div>
                    </div>

                    <div class="box-footer">
                        <button class="btn btn-primary saveCalendarEvent pull-right">Save</button>
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

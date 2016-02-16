@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/edit-holiday.css') }}">

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.holidays')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('groups.index') }}">{{trans('messages.calendar')}}</a></li>
    <li class="active">{{trans('messages.holidays')}}</li>
  </ol>
</section>

<section class="content">
      <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">{{trans('messages.holidays')}}</h3>
                <a href="{{ route('calendars.index') }}" class="btn btn-primary btn-sm">Calendar</a>
              </div>
              <div class="box-body">
                <div class="inner-box-body">
                  <div class="wrap-center">
                    <?php
                    foreach ($holidays as $key => $value): ?>
                      <div class="item">
                        <div class="it-ca">
                          <input type="text" class="datepicker form-control" name="it_ca_da" value="{{$value->date}}" readonly>
                        </div>
                        <div class="it-de">
                          <textarea name="it_de_te" rows="2" cols="40" class="form-control">{{$value->description}}</textarea>
                        </div>
                        <a href="javascript:" class="it-co btn btn-xs btn-danger"><i class="fa fa-fw fa-ban"></i></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="footer-ed-ho row">
                    <div class="col-md-offset-7">
                      <button class="btn btn-primary add-ed-ho">Add</button>
                      <button class="btn btn-primary save-ed-ho">Save</button>
                    </div>
                  </div>
                </div>

              </div><!-- /.box-body -->
            </div> <!-- .box .box-primary -->
          </div>  <!-- col-xs-12 -->
      </div> <!-- row -->

</section>
</div>

<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
<script type="text/javascript" src="{{ Asset('json2/json2.js') }}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Select 2 -->
<script type="text/javascript" src="{{ Asset('bootstrap/js/select2.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ Asset('bootstrap/css/select2.min.css') }}" />
<!-- Handlebar javascript-->
<script type="text/javascript" src="{{ Asset('handlebars-v3.0.3.js') }}"></script>

<script id="item-template" type="text/x-handlebars-template">
  <div class="item">
    <div class="it-ca">
      <input type="text" class="datepicker form-control" name="it_ca_da" readonly>
    </div>
    <div class="it-de">
      <textarea name="it_de_te" rows="2" cols="40" class="form-control"></textarea>
    </div>
    <a href="javascript:" class="it-co btn btn-xs btn-danger"><i class="fa fa-fw fa-ban"></i></a>
  </div>
</script>

<!-- Modal -->
<div id="saveModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>Save holiday successfully</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('body').on('focus',".datepicker", function(){
        $(this).datepicker({'dateFormat' : 'dd/mm/yy'});
    })

    $('.save-ed-ho').click(function(){
      var data = [];
      $("input[name='it_ca_da']").each(function(key,value){
        var objval = {};
        objval.date = $(value).val();
        if (objval.date == "") {
          return;
        }
        objval.description = $('textarea[name="it_de_te"]').eq(key).val();
        data.push(objval);
      });

      $.ajax({
        url : "{{ route('calendar.editHoliday') }}",
        data : {data : JSON.stringify(data), _token : "{{ csrf_token() }}"},
        type : "POST",
        success : function(result) {
          if (result.status == 'ok') {
            $('#saveModal').modal("show");
          }
        }
      });
    });

    $('.wrap-center').on('click','.it-co',function(){
      $(this).parent().remove();
    });

    $('.add-ed-ho').click(function(){
      var source   = $("#item-template").html();
      $('.wrap-center').append(source);
    });
  });
</script>
@stop

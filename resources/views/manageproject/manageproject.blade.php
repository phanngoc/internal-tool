@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section('body.content')
  
  <link rel="stylesheet" type="text/css" href="{{ Asset('css/manageproject.css') }}">

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


  <script id="iteminput" type="text/x-handlebars-template">
    <li><label for="item">Name </label><input name="item"/> <label for="startDate">Start date </label><input name="startDate"/> <label for="endDate">End date </label><input name="endDate"/><a class="delete">Delete</a><a class="add">Add</a></li>
  </script>
  <style type="text/css">
    input[name=item]
    {
      width: 165px;
    }
    input[name=startDate]
    {
      width: 58px;
    }
    input[name=endDate]
    {
      width: 58px;
    }
    ul#list-add-detail-feature li{
      display: block;
      margin-left: -18px;
      margin-top: 10px;
    }
    a.add{
      color : white;
      text-decoration : none;
      background-color : #3b86e2;
      border-radius : 5px;
      padding : 3px;
      margin: 3px;
    }
    a.delete{
      color : white;
      text-decoration : none;
      background-color : #ff4d21;
      border-radius : 5px;
      padding : 3px;
      margin: 3px;
    }
    .ui-datepicker-calendar a.ui-state-default
    {
      display: block;
      width: 20px;
      height: 20px;
    }
    .box-body{
      min-width: 1036px;
    }
  </style>

  <script type="text/javascript">
    var ganttData;
    var ganttDataServer;


    // angular.module('appAll',[])
    //    .controller('MyController',['$scope', function($scope) {
    //       $scope.ganttData = ganttData;
    //       $scope.featurename = "dsdsd";
    // }]);
    function convert_datepicker_mysql(date)
    {
      month = date.substr(0,2);
      day = date.substr(3,2);
      year = date.substr(6,4);
      result = year+":"+month+":"+day+" 00:00:00";
      return result;
    }
    function convert_datepicker_gantt(date)
    {
      month = date.substr(0,2);
      day = date.substr(3,2);
      year = date.substr(6,4);
      console.log(month+"|"+day+"|"+year);
      result = new Date(year,month,day);
      return result;
    }

    function addbuttonaction()
    {

      $('.ganttview-vtheader').css({'margin-top':'0px'});
      $('.ganttview-vtheader').prepend('<div class="buttonaction" style="display:block;height:40px;"><div class="btnactionadd"><img src="images/buttonadd.jpg" width="32" height="32" /></div></div>');
      $('.btnactionadd').click(function(){

        $('#modal-add-feature').modal('show');

        $('body').on('focus','input[name="startDate"]', function(){
            $(this).datepicker();
        });
        $('body').on('focus','input[name="endDate"]', function(){
            $(this).datepicker();
        });
        var features = '<select class="choosefeature"><option disabled selected> -- select an option -- </option><option value="new">New</option>';
        $.each(ganttData,function(key,value){
           features += '<option value="'+value.id+'">'+value.name+'</option>';
        });
        features += '</select>';
        $('div.areaselectfeature').append(features);

        $('div.areaselectfeature').on('click','a.add',function(){
            console.log('fire may lan');
            var source   = $("#iteminput").html();
            var template = Handlebars.compile(source);
            var content = template();
            $('ul#list-add-detail-feature').append(content);
        });


        var idchoose = 0;
        var itemfeatureadd = {};
        itemfeatureadd.series = [];
        $('select.choosefeature').change(function(){
            $('#list-add-detail-feature').remove();
            $('input[name="addfeature"]').remove();
            $('.addfea').remove();
            idchoose = $(this).val();
            if($(this).val()=='new')
            {
              var html = '<input name="addfeature"/><a class="addfea">Add</a>';
              $('div.areaselectfeature').append(html);
              $('a.addfea').click(function(){
                itemfeatureadd.id = ganttData.length+1;
                itemfeatureadd.name = $('input[name="addfeature"]').val();
                var source   = $("#iteminput").html();
                var template = Handlebars.compile(source);
                var content = template({id : 0});
                var html = '<ul id="list-add-detail-feature">'+content+'</ul>';
                $('div.areaselectfeature').append(html);
                $('div.areaselectfeature').on('click','a.delete',function(){
                    $(this).parent().remove();
                });
              });
            }
            else
            {
              var source   = $("#iteminput").html();
              var template = Handlebars.compile(source);
              var content = template({id : 0});
              var html = '<ul id="list-add-detail-feature">'+content+'</ul>';
              $('div.areaselectfeature').append(html);
              $('div.areaselectfeature').on('click','a.delete',function(){
                  $(this).parent().remove();
              });
            }
        });//$('select.choosefeature').change(function(){

        $('.save_change_add_feature').click(function(){

          $('ul#list-add-detail-feature li').each(function(key,value){
              var name = $(value).find('input[name="item"]').val();
              var startDate = $(value).find('input[name="startDate"]').val();
              var endDate = $(value).find('input[name="endDate"]').val();
              var newItemDetail = {};
              newItemDetail.employees = [];
              newItemDetail.idparent = idchoose;
              newItemDetail.name = name;
              newItemDetail.start = convert_datepicker_gantt(startDate);
              newItemDetail.end = convert_datepicker_gantt(endDate);
              newItemDetail.startServer = convert_datepicker_mysql(startDate);
              newItemDetail.endServer = convert_datepicker_mysql(endDate);
              if(idchoose == 'new')
              {
                itemfeatureadd.series.push(newItemDetail);
              }
              else
              {
                ganttData[idchoose-1].series.push(newItemDetail);
              }

          });
          if(idchoose == 'new')
          {
              ganttData.push(itemfeatureadd)
          }
          loadGantt(ganttData);
          $('#modal-add-feature').modal('hide');
        });

      }); //$('.btnactionadd').click(function(){




    } // function addbuttonaction()

    $(document).ready(function(){
      $('#modal-add-feature').on('hidden.bs.modal',function(){
         $('div.areaselectfeature').off('click','a.add');
         $('.areaselectfeature').empty();
      });
      function loadInit(id)
      {
        $.ajax({
            url : 'manageproject/getTotalData/'+id,
            type : 'GET',
            async: false

        }).done(function(response){
            ganttData = JSON.parse(response);

            $.each(ganttData,function(kgantt1,vgantt1){
                $.each(vgantt1.series,function(kgantt2,vgantt2){
                  var year_start = parseInt(vgantt2.start.substring(0,4));
                  var month_start = parseInt(vgantt2.start.substring(5,7))-1;
                  var day_start = parseInt(vgantt2.start.substring(8,10));
                  var date_start = new Date(year_start,month_start,day_start);

                  ganttData[kgantt1].series[kgantt2].startServer = vgantt2.start;
                  ganttData[kgantt1].series[kgantt2].start = date_start;

                  var year_end = parseInt(vgantt2.end.substring(0,4));
                  var month_end = parseInt(vgantt2.end.substring(5,7))-1;
                  var day_end = parseInt(vgantt2.end.substring(8,10));
                  var date_end = new Date(year_end,month_end,day_end);

                  ganttData[kgantt1].series[kgantt2].endServer = vgantt2.end;
                  ganttData[kgantt1].series[kgantt2].end = date_end;
                });
            });
            ganttDataServer = ganttData;
            console.log(ganttData);
            loadGantt(ganttData);

        });
      } // End loadInit()
      loadInit(5);

      $(".chooseproject").click(function() {
        var val = $('select#chooseproject').val();
        loadInit(val);
      });
      $('#chooseproject').select2();
    });

    function loadGantt(ganttData)
    {
        $("#ganttChart").empty();
        (function ($) {
            $("#ganttChart").ganttView({
              data: ganttData,
              slideWidth: 731,
              behavior: {
                onClick: function (data) {

                },
                onResize: function (data) {
                  console.log(data);
                  var startDate = data.start.toString("yyyy-MM-dd");
                  var endDate = data.end.toString("yyyy-MM-dd");
                  var arr = ganttDataServer[data.idparent-1].series;
                  $.each(arr,function(key,value){
                    console.log(value.name+"|"+data.name);
                    if(value.name === data.name)
                    {
                      ganttData[data.idparent-1].series[key].startServer = startDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].endServer = endDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].start = data.start;
                      ganttData[data.idparent-1].series[key].end = data.end;
                    }
                  });
                },
                onDrag: function (data) {
                  var startDate = data.start.toString("yyyy-MM-dd");
                  var endDate = data.end.toString("yyyy-MM-dd");
                  var arr = ganttDataServer[data.idparent-1].series;
                  $.each(arr,function(key,value){
                    console.log(value.name+"|"+data.name);
                    if(value.name === data.name)
                    {
                      ganttData[data.idparent-1].series[key].startServer = startDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].endServer = endDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].start = data.start;
                      ganttData[data.idparent-1].series[key].end = data.end;
                    }
                  });
                }
              }
            });

        })(jQuery_1_4_2);

        addbuttonaction();

        $('.ganttview-vtheader-item-name').click(function(){
           $('#myModal').modal('show');
           $('input[name="feature"]').val($(this).text());
           $('input[name="feature"]').attr('paramindex',$(this).parent().index()-1);
        });
        $('.save_change_feature').click(function(){
           var val = $('input[name="feature"]').val();
           var index = $('input[name="feature"]').attr('paramindex');
           $('.ganttview-vtheader-item').eq(index).find('.ganttview-vtheader-item-name').text(val);
           $('#myModal').modal('hide');
           ganttDataServer[index].name = ganttData[index].name = val;
        });

        var key_detailfeature = 0;
        var key_sub_detailfeature = 0;
        $('.ganttview-vtheader-series-name').click(function(){
           $('#modal_detail_feature').modal('show');
           // o day phai -1 vi index no tinh them ca div co button add
           key_detailfeature = $(this).parent().parent().index()-1;
           key_sub_detailfeature = $(this).index();
           var id = ganttData[key_detailfeature].series[key_sub_detailfeature].id;
           $('input[name="feature-detail"]').val($(this).text());
           $.ajax({
              url : 'manageproject/getEmployee/'+id,
              type : 'GET',

           }).done(function(res){
              $('.content-detail-feature').html(res);
              $('.js-add-employee').select2({placeholder: "Please enter employee"});
           });

        })
        $('.save_change_detailfeature').click(function(){
           $('#modal_detail_feature').modal('hide');
           ganttData[key_detailfeature].series[key_sub_detailfeature].name = $('input[name="feature-detail"]').val();
           ganttDataServer[key_detailfeature].series[key_sub_detailfeature].name = $('input[name="feature-detail"]').val();
           console.log(key_detailfeature);
           // o day phai cong 1 vi
           $('.ganttview-vtheader-item').eq(key_detailfeature).find('.ganttview-vtheader-series-name').eq(key_sub_detailfeature).text($('input[name="feature-detail"]').val());
           var resem = [];
           $.each($('.js-add-employee').find(':selected'),function(key,value){
              resem.push($(value).val());
           });
           ganttData[key_detailfeature].series[key_sub_detailfeature].employees = resem;
           console.log(ganttData);
        });
        $('.delete_detailfeature').click(function(){
           $('#modal_detail_feature').modal('hide');

           ganttData[key_detailfeature].series.splice(key_sub_detailfeature,1);
           ganttDataServer[key_detailfeature].series.splice(key_sub_detailfeature,1);

           if(ganttData[key_detailfeature].series.length == 0)
           {
             ganttData.splice(key_detailfeature,1);
             ganttDataServer.splice(key_detailfeature,1);
           }
           loadGantt(ganttData);
        });

        $('.saveall').click(function(){
            $.ajax({
              url : 'manageproject/saveAll',
              data: { data : ganttData , _token :"{{csrf_token()}}" },
              type : 'POST',
            }).done(function(res){
               console.log(res);
            });
        });
     }

  </script>

<style type="text/css">
    .ganttview-block-container{
      height: 31px !important;
    }
    .ganttview-hzheader-day{
      width: 21px !important;
    }
    .ganttview-grid-row-cell{
      width: 21px !important;
    }
    .ganttview-block{
      height: 25px !important;
    }
</style>

<!-- Modal feature -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="feature">Feature</label>
             <input name="feature" class="form-control" />
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_change_feature">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal detail feature -->
<div class="modal fade" id="modal_detail_feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Feature</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="feature-detail">Feature name</label>
             <input name="feature-detail" class="form-control" />
           </div>
           <div class="form-group content-detail-feature">

           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger delete_detailfeature" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary save_change_detailfeature">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<!-- Modal add feature -->
<div class="modal fade" id="modal-add-feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-controller="MyController">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add feature</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="addfeature">Feature name</label>
             <div class="areaselectfeature">

             </div>
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_change_add_feature">Save changes</button>
      </div>
    </div>
  </div>
</div>


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
                    <h3 class="box-title">{{trans('manageproject.list_detail_feature')}}</h3>
                  </div>
                  <div class="box-body">
                    <div class="header-managerproject row">
                       <div class="col-md-8">
                         <a href="{{ route('manageproject.createDetailFeature') }}" class="btn btn-primary">{{ trans('manageproject.create_detail_feature') }}</a>
                       </div>
                       <select id="chooseproject" class="col-md-2">
                         @foreach($projects as $value)
                          <option value="{{ $value->id }}">{{ $value->projectname }}</option>
                         @endforeach
                       </select>
                       <button class="btn btn-primary chooseproject" >Choose project</button>
                       <div class="col-md-1"></div>
                    </div>
                    <!-- repair -->
                    <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Issue</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Grantt</a></li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                             <div class="box box-info">
                                  <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <th>Id</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Title</th>
                                        <th>Assigned To</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>%Done</th>
                                      </tr>
                                      @forelse ($detailfeatures as $depo)
                                        <tr>
                                          <td>{{ $depo->id }}</td>
                                          <td>{{ $depo->status()->get()[0]->name }}</td>
                                          <td>{{ $depo->priority()->get()[0]->name }}</td>
                                          <td><a href="{{ route('manageproject.editDetailFeature',$depo->id) }}">{{ $depo->name }}</a></td>
                                          <td>
                                          @foreach ($depo->employees()->get() as $employee)
                                            <span class="name_assigned">{{ $employee->lastname.' '.$employee->firstname }}</span>
                                          @endforeach
                                          </td>
                                          <td>{{ $depo->startdate }}</td>
                                          <td>{{ $depo->enddate }}</td>
                                          <td>{{ $depo->done }}%</td>
                                        </tr>
                                      @empty
                                        You currently do not have item
                                      @endforelse
                                    </tbody>
                                  </table>
                             </div> <!-- .box box-info -->
                           </div> <!-- #tab_1 -->
                           <div class="tab-pane" id="tab_2">
                            <div class="box box-info">
                                <div id="ganttChart"></div>
                            </div>
                           </div> <!-- #tab_2 -->
                         </div> <!-- .tab-content -->
                    <!-- repair -->
                    <br/>
                    <div class="footer-managerproject row">
                      <button class="btn btn-primary col-md-offset-10 saveall">Save</button>
                    </div>
                    <div id="eventMessage"></div>
                  </div><!-- /.box-body -->
                </div>
              </div>
        </div>
  </section>
</div>
@stop

@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')

<style type="text/css">

#calendar {
    display: block;
    width: 100%;
    height: 390px;
    position: relative;
}

#calendar .sidebar-calendar {
    display: block;
    width: 175px;
    height: 390px;
    position: absolute;
    left: 0px;
    top: 0px;
    overflow: scroll;
}

#calendar .content-calendar {
    display: block;
    height: 390px;
    position: absolute;
    left: 176px;
    top: 0px;
    overflow: scroll;
}

.nameitem {
    display: block;
    height: 40px;
    min-width: 170px;
    border: 1px solid #c3c7c9;
}

.item,.day,.innerblank{
    display: block;
    height: 40px;
    width: 40px;
    border: 1px solid #c3c7c9;
    font-weight: bold;
}
/*  #calendar .content-calendar table{
    position: relative;
  }*/

.content-calendar thead,
.sidebar-calendar thead {
    /*    position: fixed;
    top : 0px;*/

    position: absolute;
    background-color: #086ca5;
    color: white;
    /*  top: 0px;*/
}
.ui-datepicker-calendar {
    display: none;
}
.ui-widget-header {
  color : black !important;
}
.header-calendar{
  margin-bottom: 10px;
}
.node-calendar{
    display: block;
    float: left;
    margin-right : 20px;
    margin-top : 20px;
}
.savecalendar{
  margin-top: 10px;
}
</style>



<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.calendar')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('groups.index') }}">{{trans('messages.employee')}}</a></li>
    <li class="active">{{trans('messages.calendar')}}</li>
  </ol>
</section>

<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.calendar')}}</h3>
                </div>
                <div class="box-body">
                  <div class="inner-box-body">
                      <div class="row header-calendar">
                        <div class="filter-fullname col-md-2">
                          <label>Search name:</label>
                          <input id="search-name" />
                        </div>

                        <div class="note col-md-8">
                          <p class="node-calendar"><b>P</b> Presence</p>
                          <p class="node-calendar"><b>A</b> Absense</p>
                          <p class="node-calendar"><b>H</b> Half a day</p>
                        </div>

                        <div class="wrappickerdate col-md-2 pull-right">
                          <label>Choose Month/Year</label>
                          <input id="datepicker" />
                        </div>
                      </div>
                      <div id="calendar">
                        <div id="datafullname" style="display:none"></div>
                        <div class="sidebar-calendar">
                          <table>
                            <thead>
                              <tr><th><div class="nameitem">Fullname</div></th></tr>
                            </thead>
                            <tbody>
                                <tr class="itemblank">
                                  <td><div class="nameitem"></div></td>
                                </tr>
                                @foreach($employees as $key => $value)
                                  <tr>
                                    <!-- <td><div class="nameitem">{{ $value->id }}</div></td> -->
                                    <td><div class="nameitem" idem="{{ $value->id }}">{{ $value->lastname }} {{ $value->firstname }}</div></td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="content-calendar">
                          <div id="datacalendar" style="display:none"></div>
                          <table>
                            <thead>
                              <tr>

                                  <?php
                                    for ($i=1;$i<=31;$i++)
                                    {
                                      echo "<th><div class='day'>Day ".$i."</div></th>";
                                    }
                                  ?>

                              </tr>
                            </thead>
                            <tbody>
                                <tr class="itemblank">
                                  <td><div class="innerblank"></div></td>
                                </tr>
                              <?php
                                foreach($employees as $key => $value)
                                {
                                  $calendar = $value->calendar;
                              ?>
                                  <tr>
                                    <?php
                                    for ($i=1;$i<=31;$i++)
                                    {
                                    ?>
                                      <td><div class="item" idem="{{ $value->id }}" idday="<?php echo $i;?>" ><?php echo $calendar->{'n'.$i};?></div></td>
                                    <?php
                                    }
                                    ?>
                                  </tr>
                              <?php
                                }
                              ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="footer-calendar row">
                        <button class="btn btn-primary col-md-offset-10 savecalendar">Save</button>
                      </div>
                  </div>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
</section>
</div>




<!-- <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.min.js') }}"></script> -->
<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
<script type="text/javascript" src="{{ Asset('json2/json2.js') }}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

    var holdData = [];
    var datasearch = [];
    var dataChange = [];
    var time = {};
    time.month = {{ $month }};
    time.year = {{ $year }};


    function AppItem (id,nid,data) {
        this.idem = id;
        this.idday = nid;
        this.data = data;
    }

    function contructData()
    {
      holdData = [];
      $('.content-calendar .item').each(function(key,value)
      {
         var idem = $(value).attr('idem')
         var idday = $(value).attr('idday');
         var data = $(value).text();
         var item = new AppItem(idem,idday,data);
         holdData.push(item);
      });
    }

    function pullDataCalendar()
    {
      var allhtml = '<tr class="itemblank"><td><div class="innerblank"></div></td></tr>';
      $.each(datasearch,function(kds,idem)
      {
        var htmlrow = '<tr>';
        $.each(holdData,function(key,value){
            if(value.idem == idem)
            {
              htmlrow += '<td><div class="item" idem="'+idem+'" idday="'+value.idday+'" >'+value.data+'</div></td>';
            }
        });
        htmlrow += '</tr>';
        allhtml += htmlrow;
      });
      $('.content-calendar table tbody').html(allhtml);
    }

    function setData(idem,idday,data)
    {
      $.each(holdData,function(khD,vhD)
      {
         if(vhD.idem == idem && vhD.idday == idday)
          {
            holdData[khD].data = data;
          }
      });
    }
    function refreshCalendarWhenChoose(month,year)
    {
      time.month = month;
      time.year = year;

      $.ajax({
         url : 'calendar/refresh/'+month+'/'+year,
         method : "GET",
        }).done(function(res){
          $('#calendar').empty();
          $('#calendar').html(res);

          attachAgain();
        });
    }
    $('#datepicker').datepicker({
        dateFormat: "mm/yy",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {

            function isDonePressed() {
                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
            }

            if (isDonePressed()) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                console.log('co the gui:'+month+"|"+year);
                month = parseInt(month)+1;
                year = parseInt(year);
                refreshCalendarWhenChoose(month,year);
                $('.date-picker').focusout() //Added to remove focus from datepicker input box on selecting date
            }
        },
        beforeShow: function(input, inst) {

            inst.dpDiv.addClass('month_year_datepicker')

            if ((datestr = $(this).val()).length > 0) {
                year = datestr.substring(datestr.length - 4, datestr.length);
                month = datestr.substring(0, 2);
                $(this).datepicker('option', 'defaultDate', new Date(year, month - 1, 1));
                $(this).datepicker('setDate', new Date(year, month - 1, 1));
                $(".ui-datepicker-calendar").hide();
            }
        }
    });


  function attachAgain()
  {
    contructData();
    var width_content = $('#calendar').width() - 175;
    $('.content-calendar').css('width', width_content);

     $('.content-calendar').scroll(function(e) {
        $('.sidebar-calendar').scrollTop($(this).scrollTop());
        $('.content-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
        $('.sidebar-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
    });

    $('.sidebar-calendar').scroll(function(e) {
        $('.content-calendar').scrollTop($(this).scrollTop());
        $('.sidebar-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
        $('.content-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
    });
    $('#datafullname').html($('.sidebar-calendar table tbody').html());
    $('#datacalendar').html($('.content-calendar table tbody').html());
  }

  attachAgain();

    $('#calendar').on('dblclick', '.item', function() {
        var val = $(this).text();
        $(this).attr('class', 'item1');
        $(this).html('<input type="text" value="' + val + '" style="z-index:10000;"/>');
        $(this).children('input').focus();
        $(this).focusout(function() {
            console.log('focusout');
            setData($(this).attr('idem'),$(this).attr('idday'),$(this).children('input').val());
            $(this).html($(this).children('input').val());
            $(this).unbind("focusout");
            $(this).attr('class', 'item');
        });
    });


    $('#search-name').keyup(function() {
        var textsearch = $(this).val();
        var htmlbuild = '';
        datasearch = [];

        var textsearch = $(this).val();
        $('#datafullname tr').each(function(key, value) {
            var text = $(value).find('.nameitem').text();
            if (text.toLowerCase().indexOf(textsearch.toLowerCase()) >= 0) {
                datasearch.push($(value).find('.nameitem').attr('idem'));
            }
            if(text.toLowerCase().indexOf(textsearch.toLowerCase()) >= 0 || $(this).hasClass("itemblank"))
            {
               htmlbuild += $("<div />").append($(this).clone()).html();
            }
        });
        $('.sidebar-calendar table tbody').html(htmlbuild);
        pullDataCalendar();
    });

    $('.savecalendar').click(function(){
      var JsonString = JSON.stringify(holdData);
      console.log(JsonString);
      $.ajax({
         url : 'calendar/save/'+time.month+'/'+time.year,
         method : 'POST',
         data : {
                 '_token' : '{{ csrf_token() }}',
                 data : JsonString
               },
         dataType: "json"
        }).done(function(res){

        });
    });
});
</script>

@stop

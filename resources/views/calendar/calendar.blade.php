@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')

<link rel="stylesheet" type="text/css" href="{{ Asset('css/calendar.css') }}">

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
                        <label>Note:</label>
                        <p class="edit-note">
                          <a href="{{ route('crud.index','description_sign') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i>Edit note</a>
                          <a href="{{ route('calendar.editHoliday') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i>Edit Holiday</a>
                        </p>
                        <?php foreach ($descriptionSigns as $key => $value): ?>
                          <p class="node-calendar"><b>{{ $value->sign }}</b> {{ $value->mean }}</p>
                        <?php endforeach; ?>
                      </div>

                      <div class="wrappickerdate col-md-2 pull-right">
                        <label>Choose Month/Year</label>
                        <input id="datepicker" value="<?php echo $month.'/'.$year;?>"/>
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
                                    $dt = null;
                                    if (checkDateValid($i, $month, $year)) {
                                      $dt = Carbon\Carbon::create($year, $month, $i);
                                      echo "<th><div class='day'>".$i."<br/>".toEnglishDate($dt->dayOfWeek)."</div></th>";
                                    }
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
                                    $dt = Carbon\Carbon::create($year, $month, $i);
                                    if (checkDateValid($i, $month, $year)) {
                                      if ($dt->dayOfWeek == 6 || $dt->dayOfWeek == 0)
                                      {
                                        ?>
                                          <td style="background-color:#ffbff7"><div class="item" idem="{{ $value->id }}" idday="<?php echo $i;?>" ><?php echo $calendar->{'n'.$i};?></div></td>
                                        <?php
                                      } else {
                                        ?>
                                          <td><div class="item" idem="{{ $value->id }}" idday="<?php echo $i;?>" ><?php echo $calendar->{'n'.$i};?></div></td>
                                        <?php
                                      }
                                    }
                                  ?>
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

                <!-- area statistic -->


                    <div class="row">
                      <!-- choose people -->
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="employee">Choose people:</label>
                          <select name="employee" class="select2">
                            <?php $isFirst = true;?>
                            @foreach($employees as $key => $value)
                             @if ($isFirst)
                                <option value="{{$value->id}}" selected>{{ $value->lastname }} {{ $value->firstname }}</option>
                             @else
                                <option value="{{$value->id}}">{{ $value->lastname }} {{ $value->firstname }}</option>
                             @endif
                               <?php $isFirst = false; ?>
                            @endforeach
                          </select>
                          <button class="btn btn-primary selectemp">Select</button>
                        </div>
                      </div>
                      <!-- choose year -->
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="year">Choose Year:</label>
                          <select name="year" class="select2">
                            <?php $checkFirst = true;?>
                            @foreach($years as $value)
                              @if ($checkFirst)
                               <option value="{{$value}}" selected>{{ $value }}</option>
                              @else
                               <option value="{{$value}}">{{ $value }}</option>
                              @endif
                              <?php $checkFirst = false; ?>
                            @endforeach
                          </select>
                          <button class="btn btn-primary selectemp">Select</button>
                        </div>
                      </div>
                    </div> <!-- .row -->


                    <div class="row">
                      <div class="col-md-8">
                        <div class="area-statistics">

                        </div>
                      </div>
                    </div>

              </div><!-- /.box-body -->
            </div> <!-- .box .box-primary -->
          </div>  <!-- col-xs-12 -->
      </div> <!-- row -->

</section>
</div>

<script id="entry-template" type="text/x-handlebars-template">
 <table class="table table-bordered">
    <thead>
     <tr>
      <th>Reason</th>
      <th>Count</th>
     </tr>
    </thead>
    <tbody>
        @{{#each items}}
          <tr>
            <td>@{{mean}}</td>
            <td>@{{count}}</td>
          </tr>
        @{{/each}}
    </tbody>
 </table>
</script>


<!-- Select 2 -->
<script type="text/javascript" src="{{ Asset('bootstrap/js/select2.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ Asset('bootstrap/css/select2.min.css') }}" />

<script type="text/javascript" src="{{ Asset('handlebars-v3.0.3.js') }}"></script>

<script type="text/javascript">
      $('.select2').select2();
      $(document).ready(function(){
        $('.selectemp').click(function(){
          var employee_id = $('select[name="employee"]').val(), year = $('select[name="year"]').val();
          $.get('{{ route("calendar.getAbsenceInYear") }}/'+employee_id+'/'+year,function(res){
            var textres = '{"items" : '+res+'}';
            var context = jQuery.parseJSON(textres);
            console.log(context);
            var source   = $("#entry-template").html();
            var template = Handlebars.compile(source);
            var html = template(context);
            console.log(html);
            $('.area-statistics').html(html);
          });
        });

        // We need change all item belong column in here.
        $('div.content-calendar table tr th div.day').click(function(){

        });
      });
</script>

<style type="text/css">
  select[name="year"],.select2-container {
    min-width: 70px;
  }
</style>

@include('calendar.js-calendar')

@stop

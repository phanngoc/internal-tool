@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.structure.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
@stop



@section ('body.content')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

 <script type="text/javascript">

    $(function () {

      $( "#dialog" ).dialog({
          modal : true,
          autoOpen: false,
          draggable : false,
          resizable : false,
          width : 400,
          show: {
            effect: "blind",
            duration: 100
          },
          hide: {
            effect: "explode",
            duration: 200
          }
      });

      $( "#dialog-form" ).dialog({
          modal : false,
          autoOpen: false,
          draggable : false,
          resizable : false,
      });

      var listposition;
      var listuser;

       $.ajax({
          method: "GET",
          url: "{{ route('listposition') }}",
          async : false
       }).done(function( msg ) {
          listposition = jQuery.parseJSON( msg );
           $.each(listposition,function(key,value){
            $('.choose_position').append('<option value="'+value.id+'">'+value.name+'</option>')
            $('.choose_position').select2();
          });
       });

       $.ajax({
          method: "GET",
          url: "{{ route('ajax.getUser') }}",
          async : false
       }).done(function( msg ) {
          listuser = jQuery.parseJSON( msg );
          $.each(listuser,function(key,value){
            $('.choose_user').append('<option value="'+value.id+'">'+value.fullname+'</option>')
            $('.choose_user').select2();
          });
       });


       var MyDateField = function(config) {
          jsGrid.Field.call(this, config);
       };

       MyDateField.prototype = new jsGrid.Field({

          itemTemplate: function(value) {

            var selecttext = "<select>";

            $.each(listposition,function(kp,valp){
               if(value.id == valp.id)
               {
                selecttext += "<option value='"+valp.id+"' selected>"+ valp.name+"</option>";
               }
               else
               {
                selecttext += "<option value='"+valp.id+"'>"+ valp.name+"</option>";
               }

            })
            selecttext += "</select>";
            return selecttext;
          },
          editTemplate: function(value) {
            var selecttext = "<select>";

            $.each(listposition,function(kp,valp){
               if(value.id == valp.id)
               {
                selecttext += "<option value='"+valp.id+"' selected>"+ valp.name+"</option>";
               }
               else
               {
                selecttext += "<option value='"+valp.id+"'>"+ valp.name+"</option>";
               }
            })
            selecttext += "</select>";

            return selecttext;
          },
          insertTemplate: function() {
            var selecttext = "<select>";

            $.each(listposition,function(kp,valp){
                selecttext += "<option value='"+valp.id+"'>"+ valp.name+"</option>";
            })
            selecttext += "</select>";
            return selecttext;
          },
          filterTemplate: function() {
            var selecttext = "<select>";

            selecttext += "<option value='0'>All</option>";

            $.each(listposition,function(kp,valp){
                selecttext += "<option value='"+valp.id+"'>"+ valp.name+"</option>";
            })

            selecttext += "</select>";
            return selecttext;
          },
          filterValue: function() {
            var val = $('.jsgrid-filter-row').find('select').val();
            //var v = $(this).children('select').find(':selected').attr('value');
            return val;
          },
          editValue: function() {
            var val = $('.jsgrid-edit-row').find('select').val();
            //var v = $(this).children('select').find(':selected').attr('value');
            return val;
          },
          addValue: function() {
            var val = $('.jsgrid-insert-row').find('select').val();
            //var v = $(this).children('select').find(':selected').attr('value');
            return val;
          },
      });


      // var responsedata = '';

      //   jsGrid.fields.myDateField = MyDateField;

      //   $("#jsGrid").jsGrid({

      //             height: "auto",
      //             width: "100%",
      //             editing: false,
      //             filtering : true,
      //             sorting: true,
      //             paging: true,
      //             pageSize: 15,
      //             pageButtonCount: 5,
      //             autoload: true,
      //             controller: {
      //                   loadData: function (filter) {
      //                       if(responsedata != '')
      //                       {
      //                         var results = [] ;
      //                         $.each(responsedata,function(index,value){
      //                            var firstname = value.firstname;
      //                            var lastname = value.lastname;
      //                            var email = value.email;
      //                            var employee_code = value.employee_code;
      //                            var phone = value.phone;
      //                            var position = value.position;
      //                            console.log(filter.position+"|"+position.id);
      //                            if(firstname.includes(filter.firstname) && lastname.includes(filter.lastname) && (email.includes(filter.email)) && (employee_code.includes(filter.employee_code)) && (phone.toString().includes(filter.phone.toString())) && (position.id == filter.position || filter.position == 0 ))
      //                            {
      //                               results.push(value);
      //                            }
      //                         });
      //                         console.log(results);
      //                         console.log(responsedata);
      //                         return results;
      //                       }
      //                       else
      //                       {
      //                         var d = $.Deferred();
      //                         $.ajax({
      //                             url: "{{ route('showemployee') }}",
      //                             type: "get",
      //                             dataType: "json"
      //                         }).done(function (response) {
      //                             d.resolve(response);
      //                             responsedata = response;
      //                         });
      //                         return d.promise();
      //                       }
      //                   },
      //                   deleteItem: function (item) {
      //                       item['_token'] = '<?php echo csrf_token();?>';
      //                       return $.ajax({
      //                           type: "POST",
      //                           url: "{{ route('deleteemployee') }}",
      //                           data: item,
      //                           dataType: "json"
      //                       }).done(function (response) {
      //                           $("#jsGrid").jsGrid("deleteItem", response);
      //                       });
      //                   },

      //               },
      //             fields: [
      //                   {name: "id", type: "hide", width: 20},
      //                   {name: "firstname", type: "text", width: 120},
      //                   {name: "lastname", type: "text", width: 120},
      //                   {name: "employee_code", type : "text" , width: 120},
      //                   {name: "phone", type: "text", width: 120},
      //                   {name: "email", type: "text", width: 120},
      //                   {name: "position", type: "myDateField", width : 120},
      //                   {
      //                     type: "control",
      //                   }
      //             ]
      //   });  // End jsGrid


      //   $("#jsGrid").jsGrid("render").done(function() {
      //       console.log("rendering completed and data loaded");
      //   });


        // $('.jsgrid-edit-button').on('click',function(){
        //     if(!checkValidate('.jsgrid-edit-row'))
        //     {
        //       return false;
        //     }
        // });

        // $('.jsgrid-insert-button').on('click',function(){
        //     if(!checkValidate('.jsgrid-insert-row'))
        //     {
        //       return false;
        //     }
        // });

  });//End jquery document


</script>

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
        <h1>
            {{trans('messages.employee_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">{{trans('messages.employee')}}</a></li>
            <li class="active">{{trans('messages.list_employee')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_employee')}}</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-2" style="margin-left:1%;">
                            <a class="btn btn-success btn-block" href="{!!route('employee.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_employee')}}</i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Employee ID Number</th>
                                    <th class="text-center">Mobile Phone</th>
                                    <th class="text-center">Position</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 0;foreach ($employees as $g): $number++;?>
				                                <tr>
				                                    <td class="text-right">{{$number}}</td>
				                                    <td>{{$g->firstname}}</td>
				                                    <td>{{$g->lastname}}</td>
				                                    <td>{{$g->employee_code}}</td>
				                                    <td>{{$g->phone}}</td>
				                                    <td>{{$g->position_name}}</td>
				                                    <td>
				                                        <a href="{{ route('employee.show', $g->id) }}" class="text-blue" title="Edit">
				                                            <i class="fa fa-fw fa-edit"></i>
				                                        </a>
				                                        <a href="{{ route('employee.destroy', $g->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
				                                            <i class="fa fa-fw fa-ban"></i>
				                                        </a>
				                                    </td>
				                                </tr>
				                                <?php endforeach;?>
                            </tbody>
                        </table>
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


<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="{{Asset('/css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/theme.css')}}" />
<script src="{{Asset('src/jsgrid.core.js')}}"></script>
<script src="{{Asset('/src/db.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-indicator.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.sort-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.text.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.number.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.select.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.checkbox.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.control.js')}}"></script>

@stop

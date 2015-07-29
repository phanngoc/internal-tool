@extends ('layouts.master')

@section ('head.title')

  List Departments

@stop


@section ('head.css')

@stop

@section ('body.content')

 <script>

    $(function () {
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
          editValue: function() {
            var v = $(this).children('select').find(':selected').attr('value');
            console.log(v);
            return v;
          }
      });
 var responsedata = '';

    jsGrid.fields.myDateField = MyDateField;

              $("#jsGrid").jsGrid({
                  height: "auto",
                  width: "100%",
                  editing: true,
                  filtering : false,
                  searching:false,
                  inserting:true,
                  sorting: true,
                  paging: true,
                  pageSize: 15,
                  pageButtonCount: 5,
                  autoload: true,
                  controller: {
                       loadData: function (filter) {
                         if(responsedata != '')
                            {
                              /*var results = [] ;
                              $.each(responsedata,function(index,value){
                                 var name = value.name.toUpperCase();
                                 var description=value.description.toUpperCase();
                       if(name.includes(filter.name.toUpperCase()) && description.includes(filter.description.toUpperCase()))

                                 {

                                    results.push(value);
                                 }
                              });

                              return results;*/
                              return;
                            }
                            else{
                            var d = $.Deferred();
                            $.ajax({
                                url: "{{ route('position.list') }}",
                                type: "get",
                                dataType: "json"
                            }).done(function (response) {
                                d.resolve(response);
                                responsedata = response;
                            });

                            return d.promise();
                          }
                        },
                     updateItem: function (updatingClient) {
                           checkUpdateValidate()

                            var d = $.Deferred();
                         updatingClient['_token'] ='<?php echo csrf_token();?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{route('positionupdate')}}",
                                data: updatingClient,
                                dataType: "json"
                            }).done(function (response) {
                              // $("#jsGrid").jsGrid("editItem", response);

                            });
                        },

                         insertItem: function(insertingClient) {
                           checkInsertValidate()
                            insertingClient['_token']= '<?php echo csrf_token();?>';

                              return $.ajax({
                                type: "POST",

                                url: "{{route('positioninsert')}}",
                                data: insertingClient,
                                dataType: "json"
                            })

                                },


                          deleteItem: function (item) {
                            item['_token'] = '<?php echo csrf_token();?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{route('position.destroy')}}",
                                data: item,
                                dataType: "json"
                            }).done(function (response) {
                                $("#jsGrid").jsGrid("deleteItem", response);
                            });
                        },
                    },
                  fields: [
                        {title:"#", width: 20, type: 'seqnum', sorting:false},
                        {name: "name", title: "Position Name", type: "text", width: 120},
                        {name: "description", title: "Description", type: "text", width: 120},
                        {type: "control"}

                  ]
                });

            });
   function isEmpty(value)
        {
            return value == '';
        }

          function checkUpdateValidate()
        {
            var name=  $('.jsgrid-edit-row').find('td:nth-child(2) input').val();
            var error = "<ul>";
              if(isEmpty(name))
              {
                 error += "<li>Please enter your position name </li>";
              }/*
              else if(name.length < 5){
               error += "<li><b>name </b>   Please enter your position name >5 characters.</li>";
            }*/

            error += "</ul>";

            if(error != "<ul></ul>")
            {
               $( "#dialog" ).html(error);
               $( "#dialog" ).dialog( "open" );
               return false;
            }
            return true;
        }
    function checkInsertValidate()
        {

           var nameinsert =  $('.jsgrid-insert-row').find('td:nth-child(2) input').val();
            var error = "<ul>";
            if(isEmpty(nameinsert))
              {
                 error += "<li>Please enter your position name </li>";
              }/*
            else  if(nameinsert.length < 5){
               error += "<li><b>name insert</b>  Please enter your position name >5 characters. </li>";
            }*/
            error += "</ul>";

            if(error != "<ul></ul>")
            {
               $( "#dialog" ).html(error);
               $( "#dialog" ).dialog( "open" );
               return false;
            }
            return true;
        }


        </script>

  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
 <div id="dialog" title="Error">
          <p></p>
        </div>


        <section class="content-header">
          <h1>
            Human Resource Management
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('position.index') }}">{{trans('messages.position')}}</a></li>
            <li class="active">List Departments</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_position')}}</h3>
                </div>
                <div class="box-body">
                  <div id="jsGrid">
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>

@stop



@section ('body.js')

<style>
    .rating {
        color: #F8CA03;
    }
</style>
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/theme.css')}}" />
<script src="{{Asset('src/jsgrid.core-2.js')}}"></script>
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
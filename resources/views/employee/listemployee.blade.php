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
          modal : true,
          autoOpen: false,
          draggable : false,
          resizable : false,

      });

      var listposition;

       $.ajax({
          method: "GET",
          url: "{{ route('listposition') }}",
          async : false
       }).done(function( msg ) {
          listposition = jQuery.parseJSON( msg );
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
      

      var responsedata = '';

        jsGrid.fields.myDateField = MyDateField;

        $("#jsGrid").jsGrid({

                  height: "auto",
                  width: "100%",
                  editing: true,
                  filtering : true,
                  sorting: true,
                  paging: true,
                  pageSize: 15,
                  pageButtonCount: 5,
                  autoload: true,
                  onItemUpdating : function(grid,row,item,itemIndex,previousItem)
                  { 
                    console.log("onItem");
                  },
                  controller: {
                        loadData: function (filter) {
                            if(responsedata != '')
                            {
                              var results = [] ;
                              $.each(responsedata,function(index,value){
                                 var firstname = value.firstname;
                                 var lastname = value.lastname;
                                 var email = value.email;
                                 var employee_code = value.employee_code;
                                 var phone = value.phone;
                                 var position = value.position;
                                 console.log(filter.position+"|"+position.id);
                                 if(firstname.includes(filter.firstname) && lastname.includes(filter.lastname) && (email.includes(filter.email)) && (employee_code.includes(filter.employee_code)) && (phone.toString().includes(filter.phone.toString())) && (position.id == filter.position || filter.position == 0 )) 
                                 {
                                    results.push(value);
                                 }
                              });
                              console.log(results);
                              console.log(responsedata);
                              return results;
                            }
                            else
                            {
                              var d = $.Deferred();
                              $.ajax({
                                  url: "{{ route('showemployee') }}",
                                  type: "get",
                                  dataType: "json"
                              }).done(function (response) {
                                  d.resolve(response);
                                  responsedata = response;
                              });
                              return d.promise();
                            }
                        },
                        insertItem:function(datadd)
                        {
                          if(!checkValidate('.jsgrid-insert-row'))
                          {
                            return false;
                          }
                          var d = $.Deferred();
                            datadd['_token'] = '<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{ route('addemployee') }}",
                                data: datadd,
                                dataType: "json"
                            }).done(function (response) {
                                console.log(response);
                                $("#jsGrid").jsGrid("insertItem", response);
                            });
                        },
                        updateItem: function (updatingClient) {
                            checkValidate('.jsgrid-edit-row');
                            var d = $.Deferred();
                            updatingClient['_token'] = '<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{ route('updateemployee') }}",
                                data: updatingClient,
                                dataType: "json"
                            }).done(function (response) {
                                console.log(response);
                                $("#jsGrid").jsGrid("editItem", response);
                            });
                        },
                        deleteItem: function (item) {
                            item['_token'] = '<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{ route('deleteemployee') }}",
                                data: item,
                                dataType: "json"
                            }).done(function (response) {
                                $("#jsGrid").jsGrid("deleteItem", response);
                            });
                        },
                     
                    },
                  fields: [
                        {name: "id", type: "hide", width: 20},
                        {name: "firstname", type: "text", width: 120},
                        {name: "lastname", type: "text", width: 120},
                        {name: "employee_code", type : "text" , width: 120},
                        {name: "phone", type: "text", width: 120},
                        {name: "email", type: "text", width: 120},
                        {name: "position", type: "myDateField", width : 120},
                        {
                          type: "control",
                          modeSwitchButton: false,
                          editButton: false,
                          headerTemplate: function() {
                              return $("<button>").attr("type", "button").text("Add")
                                      .on("click", function () {
                                          showDetailsDialog("Add", {});
                                      });
                          }
                        }
                  ]
        });  // End jsGrid
        

        var showDetailsDialog = function(dialogType, client) {

     
            formSubmitHandler = function() {
                saveClient(client, dialogType === "Add");
            };
     
            $("#dialog-form").dialog("open");
        };


        $("#jsGrid").jsGrid("render").done(function() {
            console.log("rendering completed and data loaded");
        });

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        }

        function isEmpty(value)
        {
            return value == '';
        }


        function checkValidate(classelem)
        {
            var firstname =  $(classelem).find('td:nth-child(2) input').val();
            var lastname = $(classelem).find('td:nth-child(3) input').val();
            var employee_code = $(classelem).find('td:nth-child(4) input').val();
            var phone = $(classelem).find('td:nth-child(5) input').val();
            var email = $(classelem).find('td:nth-child(6) input').val();
            var position = $(classelem).find('td:nth-child(7) select').val();
            console.log(firstname+"|"+lastname+"|"+employee_code+"|"+phone+"|"+email+"|"+position);
            var error = "<ul>";
            if(isEmpty(firstname))
            {
              error += "<li><b>firstname</b> not empty </li>";
            }
            if(isEmpty(lastname))
            {
              error += "<li><b>firstname</b> not empty </li>";
            }
            if(isEmpty(employee_code))
            {
              error += "<li><b>employee_code</b> not empty</li>";
            }
            if(isEmpty(phone))
            {
              error += "<li><b>phone</b> not empty</li>";
            }
            if(isEmpty(email))
            {
              error += "<li><b>email</b> not empty</li>";
            }
            if(!isValidEmailAddress(email))
            {
              error += "<li><b>email</b> not valid</li>";
            }
            if(isEmpty(position))
            {
              error += "<li><b>position</b> not empty</li>";
            }
            error += "</ul>";

            if(error != "<ul></ul>")
            {
               $( "#dialog" ).html(error);
               $( "#dialog" ).dialog( "open" );
               return false;
            }
            return true;
        }

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

        <!-- Content Header (Page header) -->
        <div id="dialog" title="Error">
          <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
        </div>

        <style type="text/css">
            label, input { display:block; }
            input.text { margin-bottom:12px; width:95%; padding: .4em; }
            fieldset { padding:0; border:0; margin-top:25px; }
            h1 { font-size: 1.2em; margin: .6em 0; }
        </style>

        <div id="dialog-form" title="Create employee">
          <form role="form">
            <fieldset>
              <div class="form-group">
                <label for="firtname">Firtname</label>
                <input type="text" name="firtname" id="name" class="text ui-widget-content ui-corner-all form-control">
              </div>
              <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="text ui-widget-content ui-corner-all form-control">
              </div>
              <div class="form-group">
                <label for="employee_code">Employee code</label>
                <input name="employee_code" id="employee_code" class="text ui-widget-content ui-corner-all form-control">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" id="phone" class="text ui-widget-content ui-corner-all form-control">
              </div>
              <div class="form-group">
                <label for="user">User</label>
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input name="position" id="position" class="text ui-widget-content ui-corner-all form-control"> 
              </div>  
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
          </form>
        </div>

        <section class="content-header">
          <h1>
            {{trans('messages.employee_manager')}}
            <small>{{trans('messages.list_employee')}}</small>
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

                    </div>
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
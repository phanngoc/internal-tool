 @extends ('layouts.master')



@section ('head.title')

  {{trans('messages.list_position')}}

@stop


@section ('head.css')

  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

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
 
    jsGrid.fields.myDateField = MyDateField;


              $("#jsGrid").jsGrid({

                  height: "auto",
                  width: "100%",
                  editing: true,
                  inserting:true,
                  sorting: true,
                  paging: true,
                  pageSize: 15,
                  pageButtonCount: 5,
                  autoload: true,
                  controller: {
                       loadData: function () {
                            var d = $.Deferred();
                            $.ajax({
                                url: "{{ route('position.list') }}",
                                type: "get",
                                dataType: "json"
                            }).done(function (response) {
                                d.resolve(response);
                            });

                            return d.promise();
                        },
                     updateItem: function (updatingClient) {
                            var d = $.Deferred();
                         updatingClient['_token'] ='<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{route('positionupdate')}}",
                                data: updatingClient,
                                dataType: "json"
                            }).done(function (response) {
                               /// $("#jsGrid").jsGrid("editItem", response);
                          
                            });
                        },
    
                         insertItem: function(insertingClient) {
                            insertingClient['_token']= '<?php echo csrf_token(); ?>';

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
                        {name: "id", type: "hide", width: 20},
                        {name: "name", type: "text", width: 120},
                        {name: "description", type: "text", width: 120},
                          {type: "control"}
                   
                  ]
                });

            });
        </script>

  <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
            {{trans('messages.position_management')}}
            <small>{{trans('messages.list_position')}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.position')}}</a></li>
            <li class="active">{{trans('messages.list_position')}}</li>
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

                <div class="row">
                    <div class="col-sm-2" style="margin-left:1%;">
                     <?php if (check(array('users.create'), $allowed_routes)): ?>
                     <a class="btn btn-success btn-block" href="{!!route('users.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_position')}}</i></a>
                     <?php endif;?>
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
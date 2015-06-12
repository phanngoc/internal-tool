 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{ Asset('jquery-accessible-tabs/jquery.accTabs.min.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-accessible-tabs/jquery-accessible-tabs.css') }}">
  <style type="text/css">
    .right{
       float : right;
    }
  </style>
@stop
@section('body.content')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.profile')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('employee.index') }}">{{trans('messages.employee')}}</a></li>
    <li class="active">{{trans('messages.profile')}}</li>
  </ol>
</section>



<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.profile')}}</h3>
                </div>
                <div class="box-body">
                    <div class="header-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4">
                        <button class='btn btn-primary export'>Export</button>  
                        <button class='btn btn-primary print'>Print</button>  
                        <button class='btn btn-primary edit'>Edit</button>  
                      </div>
                    </div>

                    <div class="tabs content-inner">
                        
                      <h3>{{ trans('messages.personal_information') }}</h3>
                      <div>
                          <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                      </div>

                      <h3>{{ trans('messages.skills') }}</h3>
                      <div>
                          <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis.</p>
                          <p>Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                      </div>

                      <h3>{{ trans('messages.educations') }}</h3>
                      <div>
                          <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                      </div>
        
                      <h3>{{ trans('messages.working_experience') }}</h3>
                      <div>
                          <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                      </div>

                      <h3>{{ trans('messages.hobbies') }}</h3>
                      <div>
                          <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                      </div>

                    </div>
                </div><!-- /.box-body -->
                <script type="text/javascript">
                  $(document).ready(function(){
                    $(".content-inner").accTabs();
                  });
                </script>
              </div>
            </div>
          </div>
</section>
</div>
@stop

@section ('body.js')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
      $(function () {
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false
        });
      });
    </script>

    <script type="text/javascript">
      $(document).on('click', 'a[data-method="delete"]', function() {
    var dataConfirm = $(this).attr('data-confirm');
    if (typeof dataConfirm === 'undefined') {
      dataConfirm = 'Are you sure delete this group?';
    }
    var token = $(this).attr('data-token');
    var action = $(this).attr('href');
    if (confirm(dataConfirm)) {
      var form =
          $('<form>', {
            'method': 'POST',
            'action': action
          });
      var tokenInput =
          $('<input>', {
            'type': 'hidden',
            'name': '_token',
            'value': token
          });
      var hiddenInput =
          $('<input>', {
            'name': '_method',
            'type': 'hidden',
            'value': 'delete'
          });

      form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
    }
    return false;
  });
    </script>
    <!-- page script -->
@stop
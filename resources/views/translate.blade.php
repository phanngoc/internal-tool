@extends ('layouts.master')
@section ('head.title')
Translate Language
@stop

@section ('body.content')
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Setting Management
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="#">Language</a></li>
            <li class="active">Translate Language</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Translate Language</h3>
                  <script>
                  $(document).ready(function(){
                    $('#selectfile').on('change', function() {
                      window.location = this.value;
                    });
                  });
                  </script>
                  <?php 
                     $filename = isset($_GET['filename']) ? $_GET['filename'] : '' ;
                  ?>
                  <select id="selectfile">
                    <?php 
                      foreach ($files as $key => $value) {
                        ?>
                          <option value="?filename=<?php echo $value ;?>" <?php if($value==$filename) echo "selected" ;?>  ><?php echo $value; ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="box-body">
                 
                  
                 <form action="?filename=<?php echo $filename;?>" method="POST">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>English</th>
                        <th>Japanese</th>
                    </thead>
                    <tbody>
                    <tbody>
						@foreach ($mangonngu as $key)
						<tr>
							<td><input type="text" class="form-control disabled" value="{{$key}}" readonly></td>
							@if(array_key_exists($key,$tiengnhat))
							<td>
								{!! Form::text('nhat[]',$tiengnhat[$key],['class'=>'form-control']) !!}
								{!! Form::hidden('key[]',$key) !!}
							</td>
							@else
							<td>
                {!! Form::text('nhat[]',null,['class'=>'form-control']) !!}
								{!! Form::hidden('key[]',$key) !!}
              </td>
							@endif
						</tr>
						@endforeach
					</tbody>
                    </tbody>
                  </table>
                  <div class="text-center">
	                  {!! Form::submit('Save', ['class'=>'btn-primary btn']) !!}
	                  <input type='button' name='cancel' id='cancel' class="btn btn-danger" value="{{trans('messages.cancel')}}">
                  </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
@stop


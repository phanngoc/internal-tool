@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section('body.content')

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      {{trans('modal.datamanager')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li class="active">{!! trans('modal.manage_table',['table'=> \Request::segment(2)]) !!}</li>
    </ol>
  </section>

  <section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{!! trans('modal.manage_table',['table'=> $nameTable]) !!}</h3>
                  <div class="box-control-right">
                    <a href="javascript:history.back();" class="btn btn-primary">Go back</a>
                  </div>
                </div>
                <div class="box-body">
                   <div class="box box-info">

                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              @foreach ($columns as $column)
                                <th>{{$column->Field}}</th>
                              @endforeach
                                <th>Action</th>
                            </tr>
                            <tr class="area-edit">
                                <form method="POST" id="formedit" data-method="POST">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <td class="primary-key"><input name="id" type="hidden" /></td>
                                  <?php $exfirst = false; ?> 
                                  @foreach ($columns as $column)
                                    @if ($exfirst)
                                      <td><input name="{{ $column->Field }}"/><p class="error-{{ $column->Field }} errors"></p></td>
                                    @endif
                                    <?php $exfirst = true; ?>
                                  @endforeach
                                  <td class="action">
                                    <a href="javascript:" class="save btn btn-primary btn-sm">Save</a>
                                    <a href="javascript:" class="reset btn btn-danger btn-sm">Cancel</a>
                                  </td>
                                </form>
                            </tr>
                            @forelse ($res as $re)
                              <tr data-id="{{$re->id}}">
                                @foreach ($columns as $column)
                                  <td class="{{$column->Field}}">{{ $re->{$column->Field} }}</td>
                                @endforeach       
                                <td>
                                  <a href="javascript:" class="text-blue edit" title="Edit">
                                      <i class="fa fa-fw fa-edit"></i>
                                  </a>
                                  <a href="{{ route('crud.destroy',array('id' => $re->id, 'table'=> \Request::segment(2) )) }}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                                      <i class="fa fa-fw fa-ban"></i>
                                  </a>
                                </td>
                              </tr>
                            @empty
                              You currently do not have item
                            @endforelse
                          </tbody>
                        </table>
                   </div> <!-- .box box-info -->
                </div><!-- /.box-body -->
              </div>
            </div>
      </div>
  </section>
</div>

<style>
  .box-control-right {
    display: block;
    float: right;
  }
</style>

<script type="text/javascript" src="{{ Asset('dirty_form-master/jquery.dirtyform.js') }}"></script>

<script type="text/javascript">

      $(".area-edit").find('input').on('keypress',function(){
          @foreach ($columns as $column)
              $('p.error-{{$column->Field}}').text("");
          @endforeach
      });

      $('.reset').click(function(){
        $('#formedit')[0].reset();
        $('#formedit').data('method','POST');
      });

      $('.edit').click(function(){
          $('#formedit').data("method","PUT");
          @foreach ($columns as $column)
            var val = $(this).parent().parent().find('.{{$column->Field}}').text();
            $('.area-edit').find('input[name="{{$column->Field}}"]').val(val);
          @endforeach
      });

      $('.save').click(function(){
        var datase = $('#formedit').serialize();
        if ($('#formedit').data('method') == 'PUT') {
          $.ajax({
              type:'post',
              url:'{{ route("crud.update",\Request::segment(2)) }}',
              data : datase,
              success:function(result){
                  if (result.iserror != 'true') {
                    $('#formedit')[0].reset();
                    $('tr').each(function(key,value){
                       if($(value).data('id') == result.id ) {
                          @foreach ($columns as $column)
                            $(value).find('.{{$column->Field}}').text(result.{{ $column->Field }});
                          @endforeach
                       }
                    });
                    // reset field to create instead of update.
                    $('#formedit').data('method', 'POST');
                  } 
                  else 
                  {
                    @foreach ($columns as $column)
                            $('p.error-{{$column->Field}}').text(result.{{ $column->Field }});
                    @endforeach
                  }
              }
          });
        } 
        else 
        {
          $.ajax({
              type:'post',
              url:'{{ route("crud.store",\Request::segment(2)) }}',
              data : datase,
              success:function(result){
                location.reload();
              }
          });
        }
      });

      $(document).on('click', 'a[data-method="delete"]', function() {

        var dataConfirm = $(this).attr('data-confirm');
        if (typeof dataConfirm === 'undefined') {
          dataConfirm = 'Are you sure delete this detail project?';
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
@stop

@extends ('layouts.master')
@section ('head.title')
  Change Language
@stop
@section ('body.content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Language Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li><a href="#">{{trans('messages.settings')}}</a></li>
      <li class="active">Change Language</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
              <a href="{{ route('languages.create') }}" class="btn btn-primary">{{ trans('language.create_language') }}</a>
              <table class="table table-bordered">
                <tr>
                  <th class="text-center">{{trans('messages.language')}}</th>
                  <th class="text-center" style="width:100px">{{trans('messages.status')}}</th>
                  <th class="text-center">{{trans('messages.translated')}}</th>
                  <th style="width:30%;" class="text-center">{{trans('messages.actions')}}</th>
                </tr>
                @foreach($languages as $language)
                <tr>
                  <td>{{ $language->language_name }}</td>
                  <td>
                    @if($language->is_default==1)
                      <h5><span class="label label-success">Default</span></h5>
                    @endif
                  </td>

                  <td>
                    <?php if ($language->code == 'en'): ?>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-primary" style="width: 100%"></div>
                      </div>
                      <span class="label label-primary pull-right" style="margin-top: 3px">100%</span>
                    <?php endif?>

                    <?php if ($language->code == 'jp'): ?>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-primary" style="width: {{ $percent_language }}%"></div>
                      </div>
                      <span class="label label-primary pull-right" style="margin-top: 3px">{{ $percent_language }}%</span>
                    <?php endif?>
                  </td>

                  <td>
                    @if($language->is_default!=1)
                      <a class="btn btn-primary btn-xs" href="{{ route('languages.changeDefaultLanguage', $language->id) }}"><i class="fa fa-flag-o"> Make default</i></a>
                    @endif
                      <a class="btn btn-primary btn-xs" href="{{ route('translate.index', $language->id) }}"><i class="fa fa-flag-o"> Translate</i></a>
                      <a class="btn btn-info btn-xs" href="{{ route('languages.show', $language->id) }}"><i class="fa fa-flag-o"> {{ trans('language.edit') }} </i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @stop
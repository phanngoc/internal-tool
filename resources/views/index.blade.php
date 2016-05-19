@extends ('layouts.master')

@section ('head.title')
	Dashboard
@stop

@section ('body.content')
	<div class="content-wrapper">
        <section class="content">
          <div class="row">
			<h3 class="text-center">WELCOME TO COMPANY MANAGEMENT TOOL</h3>
			@if (Session::has('message'))
				<div class="alert alert-danger">
				  <strong>Caution!</strong> {{ trans('messages.dont_have_permission') }}
				</div>
			@endif
          </div>
        </section>
    </div>
@stop
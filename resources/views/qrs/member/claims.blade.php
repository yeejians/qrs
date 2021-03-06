@extends('layouts.default')

@section('title')
Cost of Claims Member Setting ::
@parent
@endsection

@section('content')

	<link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/select2-bootstrap.css') }}" rel="stylesheet">

	<div class="page-header"><h3><span class="glyphicon glyphicon-user"></span> Cost of Claims Member List</h3></div>

	<form class="form-horizontal" method="post" action="" autocomplete="off" role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group">
			<label class="col-md-2 control-label" for="add">Enter User:</label>
			<div class="col-md-10">
				<select class="form-control populate" multiple name="add[]" id="add">
					@foreach ($lists as $add)
						<option value="{{ $add->id }}">{{ $add->display_name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		@if ($result->user->count() > 0)
			<div class="form-group">
				<label class="col-md-2 control-label" for="remove">Current User:<BR /><span class="label label-danger">* tick to remove from list</span></label>
				<div class="col-md-10">
					@foreach ($result->user as $remove)
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remove[]" value="{{ $remove->id }}"> {{ $remove->display_name }}
							</label>
						</div>
					@endforeach
				</div>
			</div>
		@endif

		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Confirm</button>
			</div>
		</div>
	</form>

	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	<script>$(function(){$('#add').select2();});</script>

@endsection
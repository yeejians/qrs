@extends('layouts.default')

@section('title')
Packing Setting ::
@parent
@endsection

@section('content')

	<link href="{{ asset('assets/css/bootstrap-sortable.css') }}" rel="stylesheet">

	<div class="page-header"><h3><span class="glyphicon glyphicon-inbox"></span> Packing Type</h3></div>
	@allow('qrs.packing.create')
		<p><a href="{{ route('qrs.packing.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create</a></p>
	@endallow

	<table class="table table-bordered table-striped table-hover sortable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Packing Type</th>
				<th>Created</th>
				<th>Created By</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($result as $key)
				<tr>
					<td>{{ $key->id }}</td>
					<td>{{ $key->name }}</td>
					<td>{{ $key->created_at }}</td>
					<td>{{ $key->creator() }}</td>
					<td>
						<a href="{{ route('qrs.packing.show', $key->id) }}" class="btn btn-primary btn-xs">Details</a>
					</td>
				</tr>
			@empty
				<td colspan="7">No results</td>
			@endforelse
		</tbody>
	</table>

	<script src="{{ asset('assets/js/bootstrap-sortable.js') }}"></script>

@endsection
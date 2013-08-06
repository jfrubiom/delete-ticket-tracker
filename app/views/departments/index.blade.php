@extends('layouts.scaffold')

@section('main')

<h1>All Departments</h1>

<p>{{ link_to_route('departments.create', 'Add new department') }}</p>

@if ($departments->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($departments as $department)
				<tr>
					<td>{{{ $department->name }}}</td>
                    <td>{{ link_to_route('departments.edit', 'Edit', array($department->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('departments.destroy', $department->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no departments
@endif

@stop
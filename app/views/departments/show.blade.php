@extends('layouts.scaffold')

@section('main')

<h1>Show Department</h1>

<p>{{ link_to_route('departments.index', 'Return to all departments') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $department->name }}}</td>
                    <td>{{ link_to_route('departments.edit', 'Edit', array($department->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('departments.destroy', $department->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
@extends('layouts.scaffold')

@section('main')

<h1>All Tickets</h1>

<p>{{ link_to_route('tickets.create', 'Add new ticket') }}</p>

@if ($tickets->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Summary</th>
				<th>Description</th>
				<th>Assignee_id</th>
				<th>Creator_id</th>
				<th>Category_id</th>
				<th>Priority</th>
				<th>Due</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>{{{ $ticket->summary }}}</td>
					<td>{{{ $ticket->description }}}</td>
					<td>{{{ $ticket->assignee_id }}}</td>
					<td>{{{ $ticket->creator_id }}}</td>
					<td>{{{ $ticket->category_id }}}</td>
					<td>{{{ $ticket->priority }}}</td>
					<td>{{{ $ticket->due }}}</td>
                    <td>{{ link_to_route('tickets.edit', 'Edit', array($ticket->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tickets.destroy', $ticket->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tickets
@endif

@stop
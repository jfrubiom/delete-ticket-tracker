@extends('layouts.scaffold')

@section('main')

<h1>All Tickets</h1>

<p>{{ link_to_route('tickets.create', 'Add new ticket') }}</p>

@if ($tickets->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Summary</th>
				<th>Assigned To</th>
				<th>Department</th>
				<th>Priority</th>
				<th>Created</th>
				<th>Due</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>{{{ $ticket->summary }}}</td>
					<td>{{{ $ticket->assignedTo ?: '<unassigned>' }}}
					<td>{{{ $ticket->department->name }}}</td>
					<td>{{{ $ticket->priority }}}</td>
					<td>{{{ $ticket->created_at->diffForHumans() }}}</td>
					<td>{{{ $ticket->due > 0 ? $ticket->due->diffForHumans() : '' }}}</td>
                    <td>{{ link_to_route('tickets.edit', 'Edit', array($ticket->id), array('class' => 'btn btn-info')) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tickets
@endif

@stop
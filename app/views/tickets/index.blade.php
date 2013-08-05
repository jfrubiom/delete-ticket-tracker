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
				<th>Due</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>{{{ $ticket->summary }}}</td>
					<td>{{{ $ticket->assignedTo->first_name }}}
					<td>{{{ $ticket->category->name }}}</td>
					<td>{{{ $ticket->priority }}}</td>
					<td>{{{ $ticket->due }}}</td>
                    <td>{{ link_to_route('tickets.edit', 'Edit', array($ticket->id), array('class' => 'btn btn-info')) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tickets
@endif

@stop
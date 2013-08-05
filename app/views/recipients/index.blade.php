@extends('layouts.scaffold')

@section('main')

<h1>All Recipients</h1>

<p>{{ link_to_route('recipients.create', 'Add new recipient') }}</p>

@if ($recipients->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Ticket_id</th>
				<th>Recipient_id</th>
				<th>Recipient_type</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($recipients as $recipient)
				<tr>
					<td>{{{ $recipient->ticket_id }}}</td>
					<td>{{{ $recipient->recipient_id }}}</td>
					<td>{{{ $recipient->recipient_type }}}</td>
                    <td>{{ link_to_route('recipients.edit', 'Edit', array($recipient->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('recipients.destroy', $recipient->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no recipients
@endif

@stop
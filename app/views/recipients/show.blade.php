@extends('layouts.scaffold')

@section('main')

<h1>Show Recipient</h1>

<p>{{ link_to_route('recipients.index', 'Return to all recipients') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Ticket_id</th>
				<th>Recipient_id</th>
				<th>Recipient_type</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
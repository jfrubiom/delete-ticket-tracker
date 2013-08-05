@extends('layouts.scaffold')

@section('main')

<h1>All Responses</h1>

<p>{{ link_to_route('responses.create', 'Add new response') }}</p>

@if ($responses->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Ticket_id</th>
				<th>Responder_id</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($responses as $response)
				<tr>
					<td>{{{ $response->ticket_id }}}</td>
					<td>{{{ $response->responder_id }}}</td>
					<td>{{{ $response->description }}}</td>
                    <td>{{ link_to_route('responses.edit', 'Edit', array($response->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('responses.destroy', $response->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no responses
@endif

@stop
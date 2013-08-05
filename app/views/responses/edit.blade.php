@extends('layouts.scaffold')

@section('main')

<h1>Edit Response</h1>
{{ Form::model($response, array('method' => 'PATCH', 'route' => array('responses.update', $response->id))) }}
	<ul>
        <li>
            {{ Form::label('ticket_id', 'Ticket_id:') }}
            {{ Form::input('number', 'ticket_id') }}
        </li>

        <li>
            {{ Form::label('responder_id', 'Responder_id:') }}
            {{ Form::input('number', 'responder_id') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('responses.show', 'Cancel', $response->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
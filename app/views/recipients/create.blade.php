@extends('layouts.scaffold')

@section('main')

<h1>Create Recipient</h1>

{{ Form::open(array('route' => 'recipients.store')) }}
	<ul>
        <li>
            {{ Form::label('ticket_id', 'Ticket_id:') }}
            {{ Form::input('number', 'ticket_id') }}
        </li>

        <li>
            {{ Form::label('recipient_id', 'Recipient_id:') }}
            {{ Form::input('number', 'recipient_id') }}
        </li>

        <li>
            {{ Form::label('recipient_type', 'Recipient_type:') }}
            {{ Form::text('recipient_type') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop



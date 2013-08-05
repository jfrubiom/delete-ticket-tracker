@extends('layouts.scaffold')

@section('main')

<h1>Edit Ticket</h1>
{{ Form::model($ticket, array('method' => 'PATCH', 'route' => array('tickets.update', $ticket->id))) }}
	<ul>
        <li>
            {{ Form::label('summary', 'Summary:') }}
            {{ Form::text('summary') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('assignee_id', 'Assignee_id:') }}
            {{ Form::input('number', 'assignee_id') }}
        </li>

        <li>
            {{ Form::label('creator_id', 'Creator_id:') }}
            {{ Form::input('number', 'creator_id') }}
        </li>

        <li>
            {{ Form::label('category_id', 'Category_id:') }}
            {{ Form::input('number', 'category_id') }}
        </li>

        <li>
            {{ Form::label('priority', 'Priority:') }}
            {{ Form::text('priority') }}
        </li>

        <li>
            {{ Form::label('due', 'Due:') }}
            {{ Form::text('due') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tickets.show', 'Cancel', $ticket->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
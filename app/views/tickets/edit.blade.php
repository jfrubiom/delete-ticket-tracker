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
            {{ Form::label('creator_id', 'Creator:') }}
            {{ Form::input('number', 'creator_id') }}
        </li>

        <li>
            {{ Form::label('department_id', 'Department:') }}
            {{ Form::select('department_id', array(), Null, array('id'=>'department_id')) }}
        </li>

        <li>
            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id', array(), Null, array('id'=>'category_id')) }}
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



@section('js')
    <script type="text/javascript">
        loadAjaxForSelectBox('/ajax/priorities', '#priority');
        loadAjaxForSelectBox('/ajax/categories', '#category_id');
        loadAjaxForSelectBox('/ajax/departments', '#department_id');
        setupAutocompleteWithId('/ajax/users', '#assignee');

        $('#due').datepicker({
            dateFormat: "m/d/yy",
            minDate: new Date(),
        });
    </script>
@stop


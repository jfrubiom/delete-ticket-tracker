@extends('layouts.scaffold')

@section('title')
    Create a ticket
@stop

@section('main')

<h1>Create Ticket</h1>

{{ Form::open(array('route' => 'tickets.store')) }}
	<ul>
        <div class="control-group {{ $errors->has('summary') ? 'error' : '' }}">
            <label class="control-label" for="summary">Summary</label>
            <div class="controls">
                <input class="span10" type="text" name="summary" id="summary" value="{{ Input::old('summary') }}" />
                {{ $errors->first('summary', '<span class="help-inline">:message</span>') }}
            </div>
        </div>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('assignee', 'Assigned To:') }}
            {{ Form::text('assignee', Null, array('id'=>'assignee')) }}
            {{ Form::hidden('assignee_id', Null, array('id'=>'assignee_id')) }}
        </li>

        <li>
            {{ Form::label('department_id', 'Department:') }}
            {{ Form::select('department_id', array(), Null, array('id'=>'department_id')) }}
        </li>

        <li>
            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id', array(), Null, array('id'=>'category_id')) }}
            {{-- Form::input('text', 'category', Null, array('id'=>'category')) --}}
            {{-- Form::hidden('category_id', Null, array('id'=>'category_id')) --}}
        </li>

        <li>
            {{ Form::label('priority', 'Priority:') }}
            {{ Form::select('priority', array(), Null, array('id'=>'priority')) }}
        </li>

        <li>
            {{ Form::label('due', 'Due:') }}
            <div class="input-append">
               {{ Form::text('due', Null, array('id'=>'due')) }}
                <span class="add-on"><i class="icon-calendar"></i></span> 
            </div>
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

@section('css')
    <link rel="stylesheet" href="/packages/jquery-ui/themes/ui-lightness/jquery-ui.css" />
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

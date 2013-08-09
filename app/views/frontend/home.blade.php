@extends('frontend/layouts/default')

@section('content')
<div class="foo">
    <p>
        @include('frontend/widgets/ticket-type-selector')
        @include('frontend/widgets/department-selector')
        @include('frontend/widgets/category-selector')
    </p>
    <p>
        @include('frontend/widgets/ticket-count')
        @include('frontend/widgets/control-panel')
    </p>
    <p>
        @include('frontend/widgets/ticket-list')
    </p>
    <p>
        @include('frontend/widgets/ticket-details')
    </p>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>
        loadAjaxForSelectBox('/ajax/tickets/types', '#ticket-type-selector');
        loadAjaxForSelectBox('/ajax/departments',  '#department-selector', 'Departments');
        loadAjaxForSelectBox('/ajax/categories',   '#category-selector', 'Categories');
        setupForReloadTablesWhenChanged('.selector');
        setupDataTable('#ticket-list-widget table');
        loadTicketCount();
        // loadTicketList();
    </script>
@stop

@extends('frontend/layouts/default')



@section('content')
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

@stop

@section('css')
@stop

@section('js')
    <script>
        loadAjaxForSelectBox('/ajax/tickets/types', '#ticket-type-selector');
        loadAjaxForSelectBox('/ajax/departments',  '#department-selector', 'Departments');
        loadAjaxForSelectBox('/ajax/categories',   '#category-selector', 'Categories');
        setupForReloadTablesWhenChanged('.selector');
        loadTicketCount()
        loadTicketList();
    </script>
@stop
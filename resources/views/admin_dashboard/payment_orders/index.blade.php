@extends('admin_layouts.admin_index')
@section('content')
    <!--begin::Card-->
    <div class="container">
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">{{ __('messages.payment_orders') }}
                    </h3>
                </div>
                <div class="card-toolbar">


                    {{-- <a href="{{ route('upgrates.create') }}" class="btn btn-light-success font-weight-bold">
                        <i class="ki ki-plus icon-md mr-2"></i>{{ __('messages.add') }}</a> --}}
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->

             <div class="table-responsive">
                {!! $dataTable->table([], true) !!}
             </div>
                <!--end: Datatable-->


                <!--end::Card-->
            @endsection
            @section('scripts')
                {{ $dataTable->scripts() }}
            @endsection
            <style>
                td.text-center {
    display: flex;
    gap: 10px
}
a.btn.Refuse {
    width: 9rem;
    background-color: crimson;
    color: white;
    font-family: 'bold';
    transition: 0.7s;
}
a.btn.Accept {
    width: 9rem;
    background-color: green;
    color: white;
    font-family: 'bold';
    transition: 0.7s;
}
a.btn.Refuse:hover {
    background-color: white;
    border: 1px solid crimson;
    color: crimson;
}
a.btn.Accept:hover {
    background-color: white;
    border: 1px solid green;
    color: green;
}
            </style>


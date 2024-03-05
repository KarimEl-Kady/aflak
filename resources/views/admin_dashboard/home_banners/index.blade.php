@extends('admin_layouts.admin_index')

@section('content')
    <!--begin::Card-->
    <div class="container">
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">{{ __('messages.home_banners') }}</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('home_banners.create') }}" class="btn btn-light-success font-weight-bold">
                        <i class="ki ki-plus icon-md mr-2"></i>{{ __('messages.add') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                {!! $dataTable->table([], true) !!}
                <!--end: Datatable-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
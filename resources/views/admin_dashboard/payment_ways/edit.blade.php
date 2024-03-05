@extends('admin_layouts.admin_index')
@section('content')
    <div class="container">
        <div class="card card-custom gutter-b">

            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!-- Your file-plus SVG icon here -->
                        </span>
                    </span>
                    <h3 class="card-label"> {{ __('messages.edit payment_ways') }}</h3>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('payment_ways.update', $payment_way->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-8 mx-auto">
                            <div class="uploadOuter">
                                <span class="dragBox">

                                    Darg and Drop image here
                                    <input type="file" name="image" onChange="dragNdrop(event)" ondragover="drag()"
                                        ondrop="drop()" id="uploadFile" />
                                </span>
                            </div>

                            <div id="preview">
                                @error('image')
                                    <span class="invalid-feedback">
                                        {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <!-- Image Upload -->


                        <!-- title Input -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="title">{{ __('messages.title') }}</label>
                                <input
                                    class="form-control @error('title') is-invalid @enderror"
                                    required value="{{ $payment_way->title ?? '' }}"
                                    name="title">
                                @error('title')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- sub_title Input -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="sub_title">{{ __('messages.sub_title') }}</label>
                                <input
                                    class="form-control @error('sub_title') is-invalid @enderror"
                                    required value="{{ $payment_way->sub_title ?? '' }}"
                                    name="sub_title">
                                @error('sub_title')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <!-- type Input -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="type">{{ __('messages.type') }}</label>
                                <input
                                    class="form-control @error('type') is-invalid @enderror"
                                    required value="{{ $payment_way->type ?? '' }}"
                                    name="type">
                                @error('type')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-shadow btn-primary font-weight-bold mt-5">
                        {{ __('messages.save') }}
                        <span class="svg-icon svg-icon m-0 svg-icon-md">
                            <!-- Your angle-double-left SVG icon here -->
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

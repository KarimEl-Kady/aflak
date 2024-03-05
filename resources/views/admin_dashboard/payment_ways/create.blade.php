@extends('admin_layouts.admin_index')

@section('content')
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!-- Your SVG Icon code -->
                        </span>
                    </span>
                    <h3 class="card-label">{{ __('messages.add payment_ways') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('payment_ways.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Image field -->
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
                    <!-- title  field -->
                    <div class="form-group">
                        <label for="title">{{ __('messages.title') }}</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                                        <!-- sub_title  field -->
                                        <div class="form-group">
                                            <label for="sub_title">{{ __('messages.sub_title') }}</label>
                                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                                   id="sub_title" name="sub_title" value="{{ old('sub_title') }}">
                                            @error('sub_title')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- type  field -->
                                        <div class="form-group">
                                            <label for="type">{{ __('messages.type') }}</label>

                                                <br><br>

                                                 <select name="type" id="type">
                                                <option value="0">Getway</option>
                                                <option value="1">Required Recepit</option>
                                              </select>

                                            {{-- <input type="type" class="form-control @error('type') is-invalid @enderror"
                                                   id="type" name="type" value="{{ old('type') }}"> --}}
                                            @error('type')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                    <button type="submit" class="btn btn-shadow btn-primary font-weight-bold mt-5">
                        {{ __('messages.save') }}
                        <span class="svg-icon svg-icon m-0 svg-icon-md">
                            <!-- Your SVG Icon code -->
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

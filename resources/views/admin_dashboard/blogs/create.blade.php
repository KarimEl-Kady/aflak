@extends('admin_layouts.admin_index')
@section('content')
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!-- SVG Icon code -->
                        </span>
                    </span>
                    <h3 class="card-label">{{ __('messages.add_blog') }}</h3>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Locale specific fields -->
                    <div class="row">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <!-- For loop for each locale -->
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('messages.title_' . $localeCode) }}<span class="text-danger"> ( {{ $localeCode }} )</span></label>
                                    <div class="text-input">
                                        <input type="text" class="form-control" name="title-{{ $localeCode }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Sections and hashtags selection -->
                    <div class="row">
                        <div class="col-lg-6">
                            <label>{{ __('messages.sections') }}</label>
                            <!-- Section selection dropdown -->
                            <div class="select">
                                <select class="form-select selectpicker" multiple aria-label="Default select example" name="section_ids[]" id="section_id">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label>{{ __('messages.hashtags') }}</label>
                            <!-- Hashtags selection dropdown -->
                            <div class="select">
                                <select class="form-select selectpicker" multiple aria-label="Default select example" name="hashtag_ids[]" id="hashtag_id">
                                    @foreach ($hashtags as $hashtag)
                                        <option value="{{ $hashtag->id }}">{{ $hashtag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Upload image section -->
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

                    <!-- Description fields -->
                    <div class="row">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('messages.description_' . $localeCode) }}<span class="text-danger"> ( {{ $localeCode }} )</span></label>
                                    <div class="text-input">
                                        <input type="text" class="form-control" name="description-{{ $localeCode }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-shadow btn-primary font-weight-bold mt-5">{{ __('messages.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

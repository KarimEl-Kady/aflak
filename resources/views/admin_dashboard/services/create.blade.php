@extends('admin_layouts.admin_index')
@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <!-- Your SVG icon code here -->
                    </span>
                </span>
                <h3 class="card-label">{{ __('messages.add_service') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.title_' . $localeCode) }}
                                <span class="text-danger"> ( {{ $localeCode }} )</span>
                            </label>
                            <div class="text-input">
                                <input type="text" class="form-control" name="title-{{ $localeCode }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>
                                {{ __('messages.text_' . $localeCode) }}
                                <span class="text-danger"> ( {{ $localeCode }} )</span>
                            </label>
                            <div class="text-input">
                                <input type="text" class="form-control" name="text-{{ $localeCode }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">{{ __('messages.image') }}</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        </div>
                        <div id="imagePreview" class="preview"></div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="icon">{{ __('messages.icon') }}</label>
                            <input type="file" class="form-control" name="icon" id="icon" accept="image/*">
                        </div>
                        <div id="iconPreview" class="preview"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-shadow btn-primary font-weight-bold mt-5">
                    {{ __('messages.save') }}
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to handle file upload and preview -->
<script>
    function previewImage(input, previewId) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = document.getElementById(previewId);
            preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
        };
        reader.readAsDataURL(file);
    }

    document.getElementById('image').addEventListener('change', function () {
        previewImage(this, 'imagePreview');
    });

    document.getElementById('icon').addEventListener('change', function () {
        previewImage(this, 'iconPreview');
    });
</script>
@endsection

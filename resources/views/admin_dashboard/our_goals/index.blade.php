@extends('admin_layouts.admin_index')
@section('content')
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo8/dist/../src/media/svg/icons/Files/File-plus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                    <h3 class="card-label"> {{ __('messages.add_our_goal') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('our_goals.update', $our_goal->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>
                                        {{ __('messages.text_' . $localeCode) }}
                                        <span class="text-danger"> ( {{ $localeCode }} )</span>
                                    </label>
                                    <div class="text-input">
                                        <input type="text" class="form-control" name="text-{{ $localeCode }}"
                                            value="{{ $our_goal->translate($localeCode)->text ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-8 mx-auto">
                            <div class="uploadOuter">
                                <span class="dragBox">
                                    Drag and Drop images here
                                    <input type="file" name="image" multiple onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" />
                                </span>
                            </div>
                            <div id="preview" class="mt-4">

                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="preview-image">
                                            <img src="{{ $our_goal->image_link }}" alt="Preview Image" style="max-width: 100%; height: auto;">
                                            {{-- <form method="post" action="{{ route('our_stories.destroy_stroy_image', $image->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-image">Delete</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('images')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="row feature-container">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{ __('messages.feature_' . $localeCode) }}
                                    <span class="text-danger"> ({{ $localeCode }})</span>
                                </label>
                                <input type="text" class="form-control"
                                       name="features[0][{{ $localeCode }}]"
                                       placeholder="Feature for {{ $localeCode }}">
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Dynamic feature inputs will be appended here -->
                <div id="features-container"></div>

                    <button type="submit" class="btn btn-shadow btn-primary font-weight-bold mt-5">
                        {{ __('messages.save') }}
                        <span class="svg-icon svg-icon m-0 svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)">
                                    </path>
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                </form>
                <!--end::Form-->
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <a href="{{ route('our_story_features.index') }}" class="btn btn-success mb-4">
                        {{ __('messages.add_feature') }}
                    </a>


                </div>

        </div> --}}

        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success mb-4" onclick="addFeatureInputs()">
                    {{ __('messages.add_feature') }}
                </button>
            </div>
        </div>

        <!-- Populate existing features from database -->
        @foreach($features as $feature)
            <div class="row feature-container">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('messages.feature' ) }}
                                <span class="text-danger"> ({{ $localeCode }})</span>
                            </label>
                            <input type="text" class="form-control"
                                   name="features[{{ $feature->id }}][{{ $localeCode }}]"
                                   value="{{ $feature->translate($localeCode)->title }}">
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">

                        <div>
                            <form method="post"
                                  action="{{ route('our_goals.destroy_features', $feature->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <script>
        let featureCounter = 1; // Starting from 1 since the first set of inputs is already there

        function addFeatureInputs() {
            const localeCodes = @json(array_keys(LaravelLocalization::getSupportedLocales()));

            localeCodes.forEach(function(localeCode) {
                const container = document.createElement('div');
                container.classList.add('row', 'feature-container');

                const label = document.createElement('label');
                label.innerText = `Feature (${localeCode})`;
                label.classList.add('col-form-label', 'col-md-3', 'col-sm-12');

                const inputDiv = document.createElement('div');
                inputDiv.classList.add('col-md-9', 'col-sm-12');

                const featureInput = document.createElement('input');
                featureInput.setAttribute('type', 'text');
                featureInput.setAttribute('class', 'form-control mb-3');
                featureInput.setAttribute('name', `features[new_${featureCounter}][${localeCode}]`);
                featureInput.setAttribute('placeholder', `Feature for ${localeCode}`);

                inputDiv.appendChild(featureInput);

                container.appendChild(label);
                container.appendChild(inputDiv);

                document.getElementById('features-container').appendChild(container);
            });

            featureCounter++;
        }
    </script>




@endsection

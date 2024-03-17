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
                        </span>                    </span>
                    <h3 class="card-label">{{ __('messages.add_our_story') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('our_story_features.update') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Default row for each locale -->
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
                    </button>
                </form>
                <!--end::Form-->
            </div>
        </div>

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
                            <label>{{ __('messages.feature_' . $localeCode) }}
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
                        <label>Delete</label>
                        <div>
                            <form method="post"
                                  action="{{ route('our_story_features.destroy', $feature->id) }}">
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
            const container = document.createElement('div');
            container.classList.add('row', 'feature-container');

            const localeCodes = @json(array_keys(LaravelLocalization::getSupportedLocales()));

            localeCodes.forEach(function(localeCode) {
                const featureInput = document.createElement('input');
                featureInput.setAttribute('type', 'text');
                featureInput.setAttribute('class', 'form-control mb-3');
                featureInput.setAttribute('name', `features[new_${featureCounter}][${localeCode}]`);
                featureInput.setAttribute('placeholder', `Feature for ${localeCode}`);
                container.appendChild(featureInput);
            });

            document.getElementById('features-container').appendChild(container);
            featureCounter++;
        }
    </script>
@endsection

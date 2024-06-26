@extends('Website.website_layouts.index')

<style>
    .card-plog {
        min-width: 280;
        overflow: auto;
    }

    .page-about-us .About-Logistics .logistics h6::after {
        left: 189px !important;
    }

    .check {
        display: block !important;
    }

    .check-one {
        display: flex !important;
        gap: 10px;
        margin-bottom: 1rem;
        align-items: center;
    }
    .home .advantges-home {
        margin-top: unset !important;
    }
</style>

@section('content')

    <!-- page-about-us -->
    <div class="page-about-us">
        <div class="about-us">
            <div class="container">
                <div class="row">
                    <p>{{ __('messages.home') }} <span>{{ __('messages.about_us') }}</span></p>
                    <h4>{{ __('messages.about_us') }}</h4>
                </div>
            </div>
        </div>
        <!-- page-about-us -->

        <!-- Our Story -->
        <div class="Our-Story">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12" data-aos="fade-right" data-aos-duration="1000">
                        <div class="shipping-services">
                            <div class="title">
                                <h1>{{ __('messages.our_story') }}</h1>
                                <p>{{ __('messages.our_story') }}</p>
                                <h5>
                                    {{ $our_story->title ?? '' }}
                                </h5>
                                <h6>
                                    {{ $our_story->text ?? '' }}
                                </h6>
                            </div>
                            <div class="xperiencee">
                                <div class="achive">
                                    @if ($our_story_features)
                                        @foreach ($our_story_features as $feature)
                                            <div class="check-one">
                                                <img src="/website/img/check.png" alt="" />
                                                <h6>{{ $feature->title }}</h6>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="years-experience">
                                    <div class="head">
                                        <h3>{{ $our_story->label_title ?? '' }}</h3>
                                        {{-- <h4>years</h4> --}}
                                    </div>
                                    <p>{{ $our_story->label_text ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6" data-aos="flip-left" data-aos-duration="1000">
                        <div class="img">
                            <img src="{{ $our_story_images[0]->image_link ?? '' }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6" data-aos="flip-right" data-aos-duration="1000">
                        <div class="img-two">
                            <img src="{{ $our_story_images[1]->image_link ?? '' }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Story -->

        <!-- About Our Logistics -->
        <div class="About-Logistics">
            <div class="container">
                <div class="row">
                    @if ($logistic_sectoion)
                        <div class="logistics" data-aos="fade-down" data-aos-duration="2000">
                            <h6>{{ __('messages.about_logistics') }}</h6>
                            <p>
                                {{ $logistic_sectoion->first_text ?? '' }}</p>
                            <img src="{{ $logistic_sectoion->image_link ?? '' }}" alt="" />
                            <p>
                                {{ $logistic_sectoion->second_text ?? '' }}</p>
                        </div>
                    @endif

                    <!-- tab -->
                    <nav data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                {{ __('messages.our_goal') }}
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                {{ __('messages.our_story') }}
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent" data-aos="flip-left">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="contant">
                                <div class="text">
                                    <p>
                                        {{ $our_goal->translate(LaravelLocalization::getCurrentLocale())->text ?? '' }}
                                    </p>
                                    @if ($our_goal_features)
                                        <div class="row">
                                            @foreach ($our_goal_features as $index => $feature)
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="check">
                                                        <div class="gols">
                                                            <img src="/website/img/qw3.png" alt="" />
                                                            <p>{{ $feature->title }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endif

                                </div>
                                <div class="img">
                                    <img src="{{ $our_goal->image_link ?? '/website/img/qw4.png' }}" alt="" />
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="contant">
                                <div class="text">
                                    <p>
                                        {{ $our_story->translate(LaravelLocalization::getCurrentLocale())->text ?? '' }}
                                    </p>
                                    @if ($our_story_features)
                                        <div class="row">
                                            @foreach ($our_story_features as $index => $feature)
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="check">
                                                        <div class="gols">
                                                            <img src="/website/img/qw3.png" alt="" />
                                                            <p>{{ $feature->title }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="img">
                                    <img src="{{$story_image->image_link ?? '/website/img/qw2.png'}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab -->
                </div>
            </div>
        </div>
        <!-- About Our Logistics -->

        <!-- swiper3 logo -->
        <div class="swiper mySwiper3" style="height: 145px;">
            <div class="swiper-wrapper">
                @foreach ($clients as $client)
                    <div class="swiper-slide">
                        <img src="{{ $client->image_link }}" alt="" />
                    </div>
                @endforeach

            </div>
        </div>
        <!-- swiper3 logo -->

        <!-- advantges -->
        <div class="advantges-home" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1300">
            <div class="container">
                <div class="head">
                    <div class="title">
                        <h1>{{ __('messages.advantages') }}</h1>
                        <p>{{ __('messages.our_advantages') }}</p>
                        <h5>{{ __('messages.what_we') }} <span>{{ __('messages.offer') }}</span>
                            {{ __('messages.for_you') }} ?</h5>
                    </div>
                    <div class="cards">
                        <div class="row">
                            @foreach ($advantages as $advantage)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card-one">
                                        <h6>{{ $advantage->title }}</h6>
                                        <div class="contant">
                                            <img src="{{ $advantage->image_link ?? '' }}" alt="{{ $advantage->title }} "
                                                style="width: 38; height: 38" />
                                            <div class="description">
                                                <p>
                                                    {{ $advantage->text ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- advantges -->
    </div>
    </div>

@endsection

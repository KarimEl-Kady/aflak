@extends('Website.website_layouts.index')

<style>

</style>

@section('content')

    <!-- serves -->
    <div class="pagge-serves">
        <div class="our-services">
          <div class="container">
            <p>{{ __('messages.home') }} <span>. {{ __('messages.services') }}</span></p>
            <h4>{{ __('messages.our_services') }}</h4>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="title">
              <h1>{{ __('messages.services') }}</h1>
              <p>{{ __('messages.our_services') }}</p>
              <h5>
                {{ __('messages.learn_about') }} <span>{{ __('messages.our') }}</span> {{ __('messages.most_important') }}
                <span>{{ __('messages.services') }}</span>
              </h5>
            </div>
            @if ($services)
@foreach ($services as $index => $service )
            @if ($index % 2 == 0)

            <div class="Important-Services"
              data-aos="fade-left"
              data-aos-anchor="#example-anchor"
              data-aos-offset="500"
            >
              <div class="items-Services">
                <div class="img">
                  <img src="{{ $service->image_link ?? '' }}" alt="" />
                </div>
                <div class="text">
                  <h4>{{ $service->title ?? '' }}</h4>
                  <p>
                   {{$service->text ?? ''}}</p>
                </div>
              </div>
              @if ( $service->service_features)
              @foreach ( $service->service_features as $feature )

              <div class="contant">
                <div class="icon">
                  <img src="/website/img/ser6.svg" alt="" />
                </div>
                <div class="text">
                  <h4>{{ $feature->title }}</h4>
                  <p>
                   {{$feature->text}}</p>
                </div>
              </div>
              @endforeach

              @endif

            </div>
            @endif
            @if ($index % 2 != 0)

            <div  class="Important-Services"
              data-aos="fade-right"
              data-aos-offset="100"
              data-aos-easing="ease-in-sine" >
              <div class="items-Services">
                <div class="img">
                  <img src="{{ $service->image_link ?? '' }}" alt="" />
                </div>
                <div class="text">
                  <h4>{{ $service->title ?? '' }}</h4>
                  <p>
                   {{$service->text ?? ''}}</p>
                </div>
              </div>
              @if ( $service->service_features)
              @foreach ( $service->service_features as $feature )

              <div class="contant">
                <div class="icon">
                  <img src="/website/img/ser6.svg" alt="" />
                </div>
                <div class="text">
                  <h4>{{ $feature->title }}</h4>
                  <p>
                   {{$feature->text}}</p>
                </div>
              </div>
              @endforeach

              @endif

                <div class="icon">
                  <img src="img/ser6.svg" alt="" />
                </div>
                <div class="text">
                  <h4>Insurance</h4>
                  <p>
                    Ocean freight services operate on specific routes between
                    various ports around the world. The routes are determined by
                    the shipping lines or NVOCCs and can be based on factors such
                    as demand, availability, and cost.
                  </p>
                </div>
              </div>
            </div>
            @endif

@endforeach

            @endif


            </div>
          </div>
        </div>
      </div>
      <!-- serves -->



      @endsection
    <!-- swiper3 -->
    <script>
        var swiper = new Swiper(".mySwiper3", {
          slidesPerView: 1,
          //centeredSlides: true,
          spaceBetween: 1,
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            // when window width is >= 480px
            480: {
              slidesPerView: 3,
              spaceBetween: 30,
            },
            // when window width is >= 640px
            1000: {
              slidesPerView: 6,
              spaceBetween: 20,
            },
          },
        });
      </script>
      <!-- swiper3 -->

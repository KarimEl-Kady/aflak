@extends('Website.website_layouts.index')

<style>
    .contact-us {
        @if($request_section && $request_section->image_link)
    background-image: url({{ $request_section->image_link }});
    @else
    background-image: url(../img/trans.png);

     @endif
}

</style>

@section('content')
    <!-- mySwiper1 -->
    <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
            @foreach ($home_slider_images as $image)
                <div class="swiper-slide">
                    <img src="{{ $image->image_link }}" alt="" />
                </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="contant-on-swiper">
            <h3>{{ "$home_slider->title" ?? '' }}</h3>
            <h6>{{ "$home_slider->subtitle" ?? '' }}</h6>
            <p>
                {{ "$home_slider->text" ?? '' }}
            </p>
            <a href="contact_us">
                <button type="button" class="btn btn-light">Contact Us</button></a>
        </div>
    </div>
    <!-- mySwiper1 -->

    <!-- advantges -->
    <div class="advantges-home" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1300">
        <div class="container">
            <div class="head">
                <div class="title">
                    <h1>{{ __('messages.advantages') }}</h1>
                    <p>{{ __('messages.our_advantages') }}</p>
                    <h5>{{ __('messages.what_we') }} <span>{{__('messages.offer')}}</span> {{ __('messages.for_you') }} ?</h5>
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
            <!-- About-Us -->
            <div class="About-Us" data-aos="zoom-in" data-aos-duration="1500">
                <div class="row align-items-end">
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="About-Us-Experiences">
                            <div class="title">
                                <h1>{{ __('messages.about_us') }}</h1>
                                <p>{{ __('messages.about_company') }}</p>
                                <h4><span>25+</span> {{ $aboutus->title ?? '' }}</h4>
                                <h6>
                                    {{ $aboutus->text ?? '' }}
                                </h6>
                            </div>
                            @foreach ($aboutus_features as $feature)
                                <div class="Experiences">

                                    <div class="img">
                                        <img src="{{ $feature->image_link ?? '' }}" alt="" style="width: 50px; height: 50px"/>
                                    </div>
                                    <div class="describe">
                                        <h5>{{ $feature->title ?? '' }}</h5>
                                        <p>
                                            {{ $feature->text ?? '' }}
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- mySwiper2 -->
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($aboutus_images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image->image_link ?? '' }}" alt="" style="width: 526px; height: 625px; border-radius: 10px"/>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination" hidden></div> <!-- Add pagination container -->
                        </div>
                    </div>

                    <!-- mySwiper2 -->
                </div>
            </div>
            <!-- About-Us -->
        </div>
    </div>
    <!-- advantges -->

    <!-- Services -->
    <div class="Services" data-aos="fade-down" data-aos-duration="2500">
        <div class="container">
            <div class="title">
                <h1>{{ __('messages.services') }}</h1>
                <p>{{ __('messages.our_services') }}</p>
                <h5>
                    {{ __('messages.learn_about') }} <span>{{ __('messages.our') }}</span> {{ __('messages.most_important') }}
                    <span>{{ __('messages.services') }}</span>
                </h5>
            </div>
            <div class="card-Services">
                <div class="row">
                    @foreach ( $services as $service )

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card-one">
                            <div class="img">
                                <img src="{{ $service->image_link }}" alt="" />
                                <div class="icon">
                                    <img src="{{ $service->icon_link ?? '' }}" alt="" />
                                </div>

                            </div>

                            <h4>{{ $service->title ?? '' }}</h4>
                            <p>
                                {{$service->text ?? ''}}
                            </p>
                            <a href="services">
                                <button type="button" class="btn btn-light">
                                    show details <i class="fa-solid fa-location-arrow"></i>
                                </button>
                            </a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->

    <div class="how-it-work">
        <div
          class="container"
          data-aos="flip-left"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="2000"
        >
          <div class="title">
            <h1>{{ __('messages.how') }}</h1>
            <p>{{ __('messages.how_its_work') }}</p>
            <h5>{{ __('messages.how_to_send_your') }} <span>{{ __('messages.package') }}</span> ?</h5>
          </div>
          <div class="items-package">
            @if ($steps)
            @foreach ($steps as $step )

            <div class="item-one">
              <div class="icon">
                  <img src="{{ $step->image_link ?? '/website/img/list.svg' }}" alt="">
              </div>
              <p>{{ $step->title ?? '' }}</p>
            </div>
            @endforeach

            @endif

          </div>
        <!-- Learn How We Work gif -->
        <div class="vidio">
            <div class="shado">
              <div
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"
              >
                <img src="/website/img/vidio3.png" alt="" />
              </div>
              <!-- Modal -->
              <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <video width="100%" controls style="border-radius: 10px">
                        <source
                          src="img/pexels-taryn-elliott-5309381 (1080p).mp4"
                          type="video/mp4"
                        />
                      </video>
                    </div>
                  </div>
                </div>
              </div>
              <h6>{{ __('messages.learn_how_we_work') }}</h6>
            </div>
          </div>
          <!-- Learn How We Work gif -->


        <!-- swiper3 logo -->
        <div class="swiper mySwiper3"  style="height: 145px;">
          <div class="swiper-wrapper">
            @foreach ($clients as $client)

            <div class="swiper-slide">
                <img src="{{ $client->image_link }}" alt="" />
            </div>
            @endforeach

          </div>
        </div>
        <!-- swiper3 logo -->
      </div>
      <!-- how-it-work -->

      <!-- contact us -->

      <div class="container">
        {{-- <div class="contact-us">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-12">
                    <div class="title">
                        <p>{{ __('messages.contact_us') }}</p>
                        <h4>{{ $request_section->title ?? '' }}</h4>
                        <h6>{{ $request_section->text ?? '' }}</h6>
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 col-12">
                    <form method="POST" action="{{ route('send_request') }}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ __('messages.your_name') }}</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="your name"
                                name="name"
                            />
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('messages.email') }}</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="your email"
                                        name="email"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('messages.phone') }}</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="your Phone"
                                        name="phone"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="freight_type">{{ __('messages.freight_type') }}</label>
                                    <select class="form-control" id="freight_type" name="freight_type">
                                        <option value="">{{ __('messages.select') }}</option>
                                        @foreach($request_types as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="load">{{ __('messages.load') }}</label>
                                    <select class="form-control" id="load" name="load">
                                        <option value="">{{ __('messages.select') }}</option>
                                        @foreach($request_loads as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.send') }}
                        </button>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="contact-us">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-12">
                    <div class="title">
                        <p>{{ __('messages.contact_us') }}</p>
                        <h4>{{ $request_section->title ?? '' }}</h4>
                        <h6>{{ $request_section->text ?? '' }}</h6>
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 col-12">
                    <form method="POST" action="{{ route('send_request') }}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ __('messages.your_name') }}</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="your name"
                                name="name"
                            />
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('messages.email') }}</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="your email"
                                        name="email"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('messages.phone') }}</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="your Phone"
                                        name="phone"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="freight_type">{{ __('messages.freight_type') }}</label>
                                    <select class="form-control" id="freight_type" name="type">
                                        <option value="">{{ __('messages.select') }}</option>
                                        @foreach($request_type_ids as $id)
                                            @php
                                                $request_type = \App\Models\RequestSection\RequestSectionSettingTranslation::where('request_section_setting_id', $id)->first();
                                            @endphp
                                            @if($request_type)
                                                <option value="{{ $id }}">{{ $request_type->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="load">{{ __('messages.load') }}</label>
                                    <select class="form-control" id="load" name="load">
                                        <option value="">{{ __('messages.select') }}</option>
                                        @foreach($request_load_ids as $id)
                                            @php
                                                $request_load = \App\Models\RequestSection\RequestSectionSettingTranslation::where('request_section_setting_id', $id)->first();
                                            @endphp
                                            @if($request_load)
                                                <option value="{{ $id }}">{{ $request_load->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('messages.send') }}</button>
                    </form>
                </div>
            </div>
        </div>

      </div>
      <!-- contact us -->

      <!-- BLOGS -->
      <div class="BLOGs" data-aos="zoom-in-up" data-aos-duration="2000">
        <div class="container">
            <div class="title">
                <div class="contant">
                    <h1>BLOGS</h1>
                    <p>Blog & News</p>
                    <h5>We Provide All The Necessary <span>Updates</span></h5>
                </div>
                <a href="blog">
                    <button type="button" class="btn btn-light">Show more</button>
                </a>
            </div>
            @if ($last_blog)

            <div class="news">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="Updates-news">
                            <div class="img">
                                <a href="{{ $last_blog ? route('blog.show', $last_blog->id) : '#' }}">
                                    <img src="{{ $last_blog ? $last_blog->image_link : asset('placeholder_image.jpg') }}" alt="" style="width: 636px; height: 303px; border-radius: 10px;" />
                                </a>
                            </div>
                            <h4>{{ $last_blog ? $last_blog->title : __('messages.no_blogs_found') }}</h4>
                            <p>{{ $last_blog ? $last_blog->created_at->format('d F Y') : __('messages.no_blogs_found') }}</p>
                            <h6>{{ $last_blog ? $last_blog->text : '' }}</h6>
                            @if ($last_blog)
                            <p>{{ $last_blog->description ?? '' }}</p>
                            <a href="{{ route('blog.show', $last_blog->id) }}">
                                <h5>{{ __('Read More') }} <i class="fa-solid fa-arrow-right"></i></h5>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        @foreach ($blogs as $blog)
                        <div class="Updates-news">
                            <div class="img">
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    <img src="{{ $blog->image_link }}" alt="" style="width: 632px; height: 222px; border-radius: 10px;"/>
                                </a>
                            </div>
                            <h4>{{ $blog->title ?? '' }}</h4>
                            <p>{{ $blog->created_at->format('d F Y') ?? '' }}</p>
                            {{-- <h6>{{ $blog->description ?? '' }}</h6> --}}
                            <a href="{{ route('blog.show', $blog->id) }}">
                                <h5>{{ __('Read More') }} <i class="fa-solid fa-arrow-right"></i></h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>


      <!-- BLOGS -->

      <!-- subscibe -->
      {{-- <div class="container">
        <div class="Subscribe" data-aos="flip-right" data-aos-duration="1500">
          <p>Get the latest news and events</p>
          <h4>Subscribe now to see the latest offers</h4>
          <form action="{{ route('send_email') }}" method="POST">
            @csrf
            <div class="col-lg-5 col-md-8 col-12">
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        name="email"
                        aria-describedby="emailHelp"
                        placeholder="Enter your email address"
                        required
                    />
                    <div class="email"><img src="img/sms.svg" alt="" /></div>

                    <div class="telgram">
                        <button type="submit" class="btn btn-primary">
                            <img src="/website/img/tel.png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </form>

        </div>
      </div> --}}
      <!-- subscibe -->


@endsection

<!-- mySwiper1 -->
<script>
    var swiper = new Swiper(".mySwiper1", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<!-- mySwiper1 -->

<!-- swiper2 -->
<script>
    var swiper = new Swiper(".mySwiper2", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<!-- swiper2 -->

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
                slidesPerView: 3,
                spaceBetween: 20,
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            680: {
                slidesPerView: 4,
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

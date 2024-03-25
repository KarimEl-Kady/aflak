@php
    $locale = LaravelLocalization::getCurrentLocale();
@endphp

<style>
    .Subscribe {
    background-image: url(/website/img/footerimg.png);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.all-dir {
    width: 100%;
}

.telgram {
        @if ($locale == 'ar')
            left: 20px;
        @else
            right: 20px;
        @endif
    }
    footer .About-company ul li {
    color: #d9d9d9;
    font-size: 16px;
    font-family: "Bold";
    padding-top: 1.5rem;
}
</style>

<!-- subscibe -->
     <div class="container">
        <div class="Subscribe" data-aos="flip-right" data-aos-duration="1500">

           <div class="all-dir">
            <p>{{ $news_email_setting->title ?? __('messages.get_the_latest_news_andevents') }}</p>
            <h4>{{ $news_email_setting->subtitle ?? __('messages.see_the_latest_offers') }}</h4>
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
                        placeholder="{{ __('messages.enter_your_email_address') }}"
                        required
                    />
                    <div class="email"><img src="{{ asset('img/sms.svg') }}" alt="" /></div>

                    <div class="telgram" >
                        <button type="submit" class="btn btn-primary">
                            <img src="/website/img/tel.png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </form>

        </div>
        <img src="{{ asset('/website/img/footerphoto.png') }}" alt="">
           </div>
      </div>
      <!-- subscibe -->

<footer>


    <!-- footer -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="logo-footer">
            <img src="/website/img/title.png" alt="" />
            <p>
              {{$setting->footer_text ?? ''}}
            </p>
            <div class="icon">
              <a href="#">
                <div class="logo">
                  <i class="fa-brands fa-twitter"></i>
                </div>
              </a>
              <a href="#">
                <div class="logo">
                  <i class="fa-brands fa-linkedin"></i>
                </div>
              </a>
              <a href="#">
                <div class="logo">
                  <i class="fa-brands fa-instagram"></i>
                </div>
              </a>
              <a href="#">
                <div class="logo">
                  <i class="fa-brands fa-facebook-f"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="About-company">
            <p>{{ __('messages.about_company') }}</p>
            <ul>
              <a href="/"><li> {{ __('messages.home') }}</li></a>
              <a href="about_us"><li>{{ __('messages.about_us') }}</li></a>
              <a href="services"><li>{{ __('messages.services') }}</li></a>
              <a href="blog"> <li>{{ __('messages.blogs') }}</li></a>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="About-company">
            <h4>{{ __('messages.other_pages') }}</h4>
            <ul>
              <a href={{route('privacies')}}><li>{{__('messages.privacy_policy')}}</li></a>
              <a href="#"><li>{{__('messages.terms_and_conditions')}}</li></a>
              <a href="{{ route('common_questions') }}"><li>{{__('messages.common_questions')}}</li></a>
              <a href="contact_us"> <li>{{__('messages.contact_us')}}</li></a>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="Communication-links">
            <p>{{ __('messages.communication_links') }}</p>
            <div class="links">
              <div class="icon">
                <img src="img/Icon4.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>{{__('messages.phone')}}</p></a>
                <a href="#"><h6>{{ $setting->phone ?? '' }}</h6></a>
              </div>
            </div>
            <div class="links">
              <div class="icon">
                <img src="img/Icon5.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>{{__('messages.email')}}</p></a>
                <a href="#"><h6>{{$setting->email ?? ''}}</h6></a>
              </div>
            </div>
            <div class="links">
              <div class="icon">
                <img src="img/Icon66.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>{{__('messages.address')}}</p></a>
                <a href="#"><h6>{{$setting->address ?? ''}}</h6></a>
              </div>
            </div>
          </div>
        </div>
        <div class="Made-by">
          <a href="#"
            ><h6>Made by <span>x</span> Coders coding with expert</h6></a
          >
          <h6>© All rights reserved @ AFLAK platform</h6>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer -->
</div>

<script src="/website/js/main.js"></script>
<script src="/website/js/swiper-bundle.min.js"></script>
<!-- counter -->
<script src="/website/js/counterup.min.js"></script>
<script src="/website/js/waypoints.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- animate -->
<script src="/website/js/aos-anmite.js"></script>
<script>
  AOS.init({ disable: "mobile" });
</script>
<!-- animate -->

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
</body>
</html>

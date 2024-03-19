@extends('Website.website_layouts.index')

<style>

</style>

@section('content')

<div class="page-contact-us">
    <div class="head-contact-us">
        <div class="container">
            <p>{{ __('messages.home') }} <span>. {{ __('messages.contact_us') }}</span></p>
            <h4>{{ __('messages.contact_us') }}</h4>
        </div>
    </div>
    <div class="img">
        <img src="img/Map.png" alt="" />
    </div>
    <div class="container">
        <div class="CONTACt">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="Related-posts">
                        <h5>{{ __('messages.contact_us') }}</h5>
                        <div class="section">
                            <div class="img">
                                <img src="/website/img/phone1.svg" alt="" />
                            </div>
                            <div class="contant">
                                <h6>{{ __('messages.contact_us') }}</h6>
                                <p>{{ $setting->phone ?? '' }}</p>
                            </div>
                        </div>
                        <div class="section">
                            <div class="img"><img src="/website/img/location.svg" alt="" /></div>
                            <div class="contant">
                                <h6>{{ __('messages.address') }}</h6>
                                <p>{{ $setting->address ?? '' }}</p>
                            </div>
                        </div>
                        <div class="section">
                            <div class="img"><img src="/website/img/mail.svg" alt="" /></div>
                            <div class="contant">
                                <h6>{{ __('messages.email') }}</h6>
                                <p>{{ $setting->email ?? '' }}</p>
                            </div>
                        </div>
                        <div class="section">
                            <div class="img"><img src="/website/img/clock.svg" alt="" /></div>
                            <div class="contant">
                                <h6>{{ __('messages.time') }}</h6>
                                <p>{{ __('messages.monday') }} - {{ __('messages.friday') }}</p>
                                {{-- <p>{{ __('messages.time_slot') }}</p> --}}
                            </div>
                        </div>
                        <div class="icon">
                            <a href="{{ $setting->twitter  ?? '' }}" target="_blank">
                              <div class="logo">
                                <i class="fa-brands fa-twitter"></i>
                              </div>
                            </a>
                            <a href="{{ $setting->linkedin   ?? '' }}" target="_blank">
                              <div class="logo">
                                <i class="fa-brands fa-linkedin"></i>
                              </div>
                            </a>
                            <a href="{{ $setting->instagram  ?? '' }}" target="_blank">
                              <div class="logo">
                                <i class="fa-brands fa-instagram"></i>
                              </div>
                            </a>
                            <a href="{{ $setting->facbook    ?? '' }}" target="_blank  }}">
                              <div class="logo">
                                <i class="fa-brands fa-facebook-f"></i>
                              </div>
                            </a>
                          </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <form>
                        <h4>{{ __('messages.contact_us') }}</h4>
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ __('messages.name') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('messages.enter_name') }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('messages.email') }}</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('messages.enter_email') }}" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ __('messages.subject') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('messages.enter_subject') }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('messages.message') }}</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="{{ __('messages.enter_message') }}" rows="3"></textarea>
                        </div>
                        <div class="Submit">
                            <button type="button" class="btn btn-primary">{{ __('messages.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<script src="js/main.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<!-- counter -->
<script src="js/counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- animate -->
<script src="js/aos-anmite.js"></script>
<script>
  AOS.init({ disable: "mobile" });
</script>

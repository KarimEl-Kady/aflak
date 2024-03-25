@extends('Website.website_layouts.index')

<style>

.CONTACt {
    margin-top: -3rem;
    position: relative;
    z-index: 11;
}
.right-form{
    margin-top: 7rem !important;

}
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
        <div class="container-fluid"  >

          <div class="map">
            {{-- <img src="https://estc.com.sa/web/image/6292/branches-map.jpg" alt="" /> --}}
            <input type="hidden" class="form-control" value="{{ old('lat') }}" id="Lat" name="lat" />
            <input type="hidden" class="form-control" value="{{ old('lon') }}" id="Lng" name="lon" />

            <div class="row">
                <div class="col-12">

                </div>
                <div id="map" style="height: 400px; width: 100%;"></div>
                <!-- Ensure the map container has a defined size -->
            </div>
        </div>

        </div>


          <!-- connect -->

          <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSkVZximb5DWCAPqk44ri8JfK_B7pySgk&callback=initMap&libraries=places">
          </script>

          <script>
            var lat1 = 25.381427;
            var lon1 = 49.582997;

            function initMap() {
              var myLatlng = new google.maps.LatLng(lat1, lon1);
              var mapOptions = {
                center: myLatlng,
                zoom: 14
              };
              var input = document.getElementById('searchTextField');
              var map = new google.maps.Map(document.getElementById("map"), mapOptions);
              var geocoder = new google.maps.Geocoder;
              var infowindow = new google.maps.InfoWindow;
              var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'I move with you man :)'
              });

              var autocomplete = new google.maps.places.Autocomplete((input), {
                types: ['geocode']
              });
              google.maps.event.addListener(autocomplete, 'place_changed', function() {

                var place = autocomplete.getPlace();

                console.log(place);



                map.panTo(place.geometry.location)
                var Lat = place.geometry.location.lat();
                var Lng = place.geometry.location.lat();
                $('#Lat').val(Lat);
                $('#Lng').val(Lng);
                $('.address').val(place.formatted_address)
              });

              google.maps.event.addListener(map, 'click', function(e) {
                //marker.setPosition(e.latLng);
                console.log(e.latLng);
                map.panTo(e.latLng)
                var Lat = e.latLng.lat();
                var Lng = e.latLng.lng();
                $('#Lat').val(Lat);
                $('#Lng').val(Lng);
                //map.setCenter(e.latLng);
              });

              google.maps.event.addListener(map, 'center_changed', function() {
                var center = map.getCenter();
                marker.setPosition(center);
                window.setTimeout(function() {
                  geocodeLatLng(geocoder, map, infowindow, marker);
                }, 2000);
              });
            }

            function geocodeLatLng(geocoder, map, infowindow, marker) {
              geocoder.geocode({
                'location': marker.position
              }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {

                  if (results[1]) {
                    //map.setZoom(11);
                    infowindow.setContent(results[1].formatted_address);
                    infowindow.open(map, marker);
                  } else {
                    console.warn('GeoCoder: No results found');
                  }
                } else {
                  console.warn('Geocoder failed due to: ' + status);
                }
              });
            }

            google.maps.event.addDomListener(window, 'load', initMap);
          </script>
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
                    <form class="right-form">
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

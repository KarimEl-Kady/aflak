@extends('Website.website_layouts.index')

<style>

</style>

@section('content')

<div class="home">
    <div class="container">
      <div class="privacy-polisty">
        <div class="head">
          <h4>
            {{__('messages.home')}} <img src="photo/icons/arrow-left.png" alt="" />
            <span>{{__('messages.privacy')}}</span>
          </h4>
        </div>
        <h3>{{__('messages.privacy')}}</h3>
        <div class="privacy-pragraf">
          <p>
            {!! $privacies->text  ?? ''!!}
          </p>
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

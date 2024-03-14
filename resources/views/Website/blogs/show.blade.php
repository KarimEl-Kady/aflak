@extends('Website.website_layouts.index')


@section('content')

    <!-- read-blog -->
    <div class="read-blog">
        <div class="container">
          <div class="row">
            <div class="head">
              <h4>{{ $blog->title ?? '' }}</h4>
              <div class="social">
                <div class="icon">
                  <a href="#"><div class="application"><i class="fa-solid fa-link"></i></div></a>
                  <a href="#"> <div class="application"><i class="fa-brands fa-linkedin"></i></div></a>
                  <a href="#"> <div class="application"><i class="fa-brands fa-twitter"></i></div></a>
                  <a href="#"><div class="application"><i class="fa-brands fa-facebook-f"></i></div></a>
                </div>
                <h6>{{ $blog->created_at->format('d F Y') ?? '' }}</h6>
            </div>
            </div>
            <div class="contant">
              <img src="{{ $blog->image_link ?? ''}}" alt="" style="width: 1166px; height:502; border-radius: 10px"/>
              <p>
                {{$blog->translate()->description ?? ''}}</p>

            </div>

          </div>
        </div>
      </div>
      <!-- read-blog -->

          <!-- subscibe -->
          {{-- <div class="container">
            <div class="Subscribe" data-aos="flip-right" data-aos-duration="1500">
              <p>Get the latest news and events</p>
              <h4>Subscribe now to see the latest offers</h4>
              <form>
                <div class="col-lg-5 col-md-8 col-12">
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="enter your email adress"
                    />
                    <div class="email"><img src="img/sms.svg" alt="" /></div>

                    <div class="telgram">
                      <button type="button" class="btn btn-primary">
                        <img src="img/tel.png" alt="" />
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div> --}}
          <!-- subscibe -->


@endsection

@extends('Website.website_layouts.index')

<style>
.card-plog {
min-width: 280;
overflow: auto;
}

</style>

@section('content')

    <!-- page-about-us -->
    <div class="page-about-us">
        <div class="about-us">
          <div class="container">
            <div class="row">
              <p>HOME . <span>ABOUT US</span></p>
              <h4>ABOUT US</h4>
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
                    <h1>Our Story</h1>
                    <p>Our Story</p>
                    <h5>
                      Your <span>shipping services</span> have become easier with
                      us
                    </h5>
                    <h6>
                      devoted to offering customized and professional support as
                      an international logistics and freight forwarding service
                      that provides quality that continues to se cure a loyal
                      customer base.
                    </h6>
                  </div>
                  <div class="xperiencee">
                    <div class="achive">
                      <div class="check">
                        <img src="img/check.png" alt="" />
                        <h6>Demand planning</h6>
                      </div>
                      <div class="check">
                        <img src="img/check.png" alt="" />
                        <h6>Materials handling</h6>
                      </div>
                      <div class="check">
                        <img src="img/check.png" alt="" />
                        <h6>Damage Insurance</h6>
                      </div>
                      <div class="check">
                        <img src="img/check.png" alt="" />
                        <h6>Fast delivery system</h6>
                      </div>
                    </div>
                    <div class="years-experience">
                      <div class="head">
                        <h3>25+</h3>
                        <h4>years</h4>
                      </div>
                      <p>We have more than years of experience</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-6" data-aos="flip-left" data-aos-duration="1000">
                <div class="img">
                  <img src="img/abo.png" alt="" />
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-6" data-aos="flip-right" data-aos-duration="1000">
                <div class="img-two">
                  <img src="img/abo2.png" alt="" />
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
              <div class="logistics" data-aos="fade-down"  data-aos-duration="2000">
                <h6>About Our Logistics</h6>
                <p>
                  Welcome to Logistics service, your trusted partner in logistics.
                  We are a team of experienced professionals who are passionate
                  about helping businesses streamline their supply chain
                  operations and optimize their logistics processes.
                </p>
                <img src="img/qw.png" alt="" />
                <p>
                  Our transportation services include ground, air, and ocean
                  freight, as well as intermodal and expedited shipping options.
                  We leverage our carrier network and technology to provide you
                  with the most cost-effective and efficient transportation
                  solutions.
                </p>
              </div>
              <!-- tab -->
              <nav data-aos="flip-left"
              data-aos-easing="ease-out-cubic"
              data-aos-duration="2000">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button
                    class="nav-link"
                    id="nav-home-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-home"
                    type="button"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true"
                  >
                    our goals
                  </button>
                  <button
                    class="nav-link"
                    id="nav-profile-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-profile"
                    type="button"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="false"
                  >
                    our story
                  </button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent" data-aos="flip-left"
              data-aos-easing="ease-out-cubic"
              data-aos-duration="2000">
                <div
                  class="tab-pane fade show active"
                  id="nav-home"
                  role="tabpanel"
                  aria-labelledby="nav-home-tab"
                >
                  <div class="contant">
                    <div class="text">
                      <p>
                        Our company was founded with a mission to simplify the
                        logistics process for our customers, and we achieve this
                        through our commitment to delivering exceptional service
                        and innovative solutions that meet the unique needs of
                        each client.Our team of experienced logistics
                        professionals work closely with our clients to understand
                        their needs, develop customized logistics solutions, and
                        provide ongoing support throughout the entire
                        transportation process.
                      </p>
                      <div class="check">
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                      </div>
                      <div class="check">
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                      </div>
                    </div>
                    <div class="img">
                      <img src="img/qw4.png" alt="" />
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="nav-profile"
                  role="tabpanel"
                  aria-labelledby="nav-profile-tab"
                >
                  <div class="contant">
                    <div class="text">
                      <p>
                        Our company was founded with a mission to simplify the
                        logistics process for our customers, and we achieve this
                        through our commitment to delivering exceptional service
                        and innovative solutions that meet the unique needs of
                        each client.Our team of experienced logistics
                        professionals work closely with our clients to understand
                        their needs, develop customized logistics solutions, and
                        provide ongoing support throughout the entire
                        transportation process.
                      </p>
                      <div class="check">
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                      </div>
                      <div class="check">
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                        <div class="gols">
                          <img src="img/qw3.png" alt="" />
                          <p>Transportation assistance</p>
                        </div>
                      </div>
                    </div>
                    <div class="img">
                      <img src="img/qw2.png" alt="" />
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
        <div class="swiper mySwiper3">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="img/swiper1.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper2.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper3.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper4.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper5.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper6.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper7.png" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="img/swiper8.png" alt="" />
            </div>
          </div>
        </div>
        <!-- swiper3 logo -->

        <!-- advantges -->
        <div class="advantges-home" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1300">
            <div class="container">
                <div class="head">
                    <div class="title">
                        <h1>Advantages</h1>
                        <p>Our Advantages</p>
                        <h5>what we <span>offer</span> for you ?</h5>
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

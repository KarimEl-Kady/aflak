@extends('Website.website_layouts.index')

<style>

</style>

@section('content')

<div class="page-contact-us">
    <div class="head-contact-us">
      <div class="container">
        <p>HOME <span>. contact us</span></p>
        <h4>contact us</h4>
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
              <h5>CONTACT</h5>
              <div class="section">
                <div class="img">
                  <img src="img/phone1.svg" alt="" />
                </div>
                <div class="contant">
                  <h6>Call Us</h6>
                  <p>(+84) 8 3555 3203</p>
                </div>
              </div>
              <div class="section">
                <div class="img"><img src="img/location.svg" alt="" /></div>
                <div class="contant">
                  <h6>our Location</h6>
                  <p>101 Your Name Road, Your City, United State.</p>
                </div>
              </div>
              <div class="section">
                <div class="img"><img src="img/mail.svg" alt="" /></div>
                <div class="contant">
                  <h6>Email Adress</h6>
                  <p>aroha.info@gmail.com</p>
                </div>
              </div>
              <div class="section">
                <div class="img"><img src="img/clock.svg" alt="" /></div>
                <div class="contant">
                  <h6>Time</h6>
                  <p>Monday – Friday</p>
                  <p>08AM – 09PM</p>
                </div>
              </div>
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
          <div class="col-lg-6 col-md-6 col-12">
            <form>
              <h4>GET IN TOUCH </h4>
              <div class="form-group">
                <label for="formGroupExampleInput">Name *</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Name"
                />
              </div>

                <div class="col-lg-12 col-md-12 col-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Email"
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                  <div class="form-group">
                      <label for="formGroupExampleInput">Subject *</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Subject"
                      />
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Your Message *</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message" rows="3"></textarea>
                </div>
                </div>
                <div class="Submit">
                  <button type="button" class="btn btn-primary">
                      Submit Question
                  </button>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- subscibe -->
  <div class="container">
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
  </div>
  <!-- subscibe -->


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

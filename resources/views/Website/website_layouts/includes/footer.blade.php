     <!-- subscibe -->
     <div class="container">
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
      </div>
      <!-- subscibe -->

<footer>


    <!-- footer -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="logo-footer">
            <img src="img/title.png" alt="" />
            <p>
              Vestibulum id ligula porta felis euismod sem per. Aenean eu
              leo quam. Pellen tesque orn are sem lacinia quam venenatis.
              Fusce dap ibus, tellus ac cursus commodo ut fermentu massa.
              mentum sit amet risus.
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
            <p>About company</p>
            <ul>
              <a href="home"><li>.. Home</li></a>
              <a href="#"><li>About us</li></a>
              <a href="services"><li>services</li></a>
              <a href="blogs"> <li>blogs</li></a>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="About-company">
            <h4>other pages</h4>
            <ul>
              <a href="#"><li>privacy policy</li></a>
              <a href="#"><li>Instructions for use</li></a>
              <a href="#"><li>common questions</li></a>
              <a href="#"> <li>contact us</li></a>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="Communication-links">
            <p>Communication links</p>
            <div class="links">
              <div class="icon">
                <img src="img/Icon4.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>phone number</p></a>
                <a href="#"><h6>+966543042000</h6></a>
              </div>
            </div>
            <div class="links">
              <div class="icon">
                <img src="img/Icon5.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>E-mail</p></a>
                <a href="#"><h6>info@aflakshipping.com</h6></a>
              </div>
            </div>
            <div class="links">
              <div class="icon">
                <img src="img/Icon66.svg" alt="" />
              </div>
              <div class="contant">
                <a href="#"> <p>Our Location</p></a>
                <a href="#"><h6>706 Campfire Ave. Meriden, CT 06450</h6></a>
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

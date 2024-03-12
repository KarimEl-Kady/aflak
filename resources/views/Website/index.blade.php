@extends('Website.website_layouts.index')

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
            <h3>{{ $home_slider->title ?? '' }}</h3>
            <h6>{{ $home_slider->subtitle ?? '' }}</h6>
            <p>
                {{ $home_slider->text ?? '' }}
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
                                        <img src="{{ $advantage->image_link ?? '' }}" alt="{{ $advantage->title }}"
                                            class="icon" />
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
                                <h1>About Us</h1>
                                <p>about company</p>
                                <h4><span>25+</span> {{ $aboutus->title ?? '' }}</h4>
                                <h6>
                                    {{ $aboutus->text ?? '' }}
                                </h6>
                            </div>
                            @foreach ($aboutus_features as $feature)
                                <div class="Experiences">

                                    <div class="img">
                                        <img src="{{ $feature->image_link ?? '' }}" alt="" />
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
                                        <img src="{{ $image->image_link ?? '' }}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div> <!-- Add pagination container -->
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
                <h1>Services</h1>
                <p>Our Services</p>
                <h5>
                    Learn About <span>Our</span> Most Important
                    <span>Services</span>
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

    <!-- how-it-work -->
    <div class="how-it-work">
        <div class="container" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="title">
                <h1>How</h1>
                <p>How It’s Work</p>
                <h5>How to send your <span>package</span> ?</h5>
            </div>
            @foreach ($steps as $step  )

            <div class="img"><img src="{{ $step->image_link ?? ''}}" alt="" /></div>
            @endforeach
        </div>
        <!-- Learn How We Work gif -->
        <div class="vidio">
            <div class="shado">
                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="img/vidio3.png" alt="" />
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <video width="100%" controls style="border-radius: 10px">
                                    <source src="img/pexels-taryn-elliott-5309381 (1080p).mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <h6>Learn How We Work</h6>
            </div>
        </div>
        <!-- Learn How We Work gif -->

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
    </div>
    <!-- how-it-work -->

    <!-- contact us -->

    <div class="container">
        <div class="contact-us">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-12">
                    <div class="title">
                        <p>contact us</p>
                        <h4>We are here for you</h4>
                        <h6>
                            Our headquarter is located in Cairo, Egypt. Our services
                            expanded throughout Egypt ports (Alexandria old port, SOKHNA
                            port, DEKHEILA port , CAI airport)
                        </h6>
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 col-12">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Your Name:</label>
                            <input type="text" class="form-control" placeholder="your name" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your Email:</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="your email" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="phone">Phone No:</label>
                                    <input type="number" class="form-control" placeholder="your Phone" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="phone">Freight type:</label>
                                    <select class="form-control">
                                        <option>select</option>
                                        <option>Default select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label for="phone">Load:</label>
                                    <select class="form-control">
                                        <option>select</option>
                                        <option>Default select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">
                            SUBMIT REQUEST
                        </button>
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
                <a href="read-blog.html"><button type="button" class="btn btn-light">Show more</button></a>
            </div>
            <div class="news">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="Updates-news">
                            <div class="img">
                                <a href="read-blog.html">
                                    <img src="img/air1.png" alt="" />
                                </a>
                            </div>
                            <h4>
                                How To Implement Sustainability In Inventory Management
                            </h4>
                            <p>February 3, 2024</p>
                            <h6>
                                As the world’s leading logistics company, we have a
                                responsibility to set an example in our industry and be a
                                sustainability leader. That means reducing our carbon
                                footprint and setting the highest social and governance
                                standards. Over the years, we have repeatedly redefined
                                logistics, from pioneering the first green logistics product
                                to becoming the first logistics company to commit to a
                                zero-emissions target. Today we offer the most comprehensive
                                portfolio of green logistics solutions in the industry.But
                                we can make an even greater impact when we join forces with
                                you. Together with many customers
                            </h6>
                            <a href="read-blog.html">
                                <h5>Read More <i class="fa-solid fa-arrow-right"></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="Updates-news">
                            <div class="img">
                                <a href="read-blog.html">
                                    <img src="img/air2.png" alt="" />
                                </a>
                            </div>
                            <h4>
                                How To Implement Sustainability In Inventory Management
                            </h4>
                            <p>February 3, 2024</p>
                            <a href="read-blog.html">
                                <h5>Read More <i class="fa-solid fa-arrow-right"></i></h5>
                            </a>
                        </div>
                        <div class="Updates-news">
                            <div class="img">
                                <a href="read-blog.html">
                                    <img src="img/air3.png" alt="" />
                                </a>
                            </div>
                            <h4>
                                How To Implement Sustainability In Inventory Management
                            </h4>
                            <p>February 3, 2024</p>
                            <a href="read-blog.html">
                                <h5>Read More <i class="fa-solid fa-arrow-right"></i></h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOGS -->

    <!-- subscibe -->
    <div class="container">
        <div class="Subscribe" data-aos="flip-right" data-aos-duration="1500">
            <p>Get the latest news and events</p>
            <h4>Subscribe now to see the latest offers</h4>
            <form>
                <div class="col-lg-5 col-md-8 col-12">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="enter your email adress" />
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

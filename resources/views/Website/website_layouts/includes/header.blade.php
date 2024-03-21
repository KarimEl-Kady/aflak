<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  -->
    <link rel="icon" href="img/title.png" type="image" />
    <!-- animation -->
    {{-- <link rel="stylesheet" href="/website/css/aos-anmite.css" /> --}}
    <!-- animation -->
    <link rel="stylesheet" href="/website/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/website/sass/_navbar.scss" />
    <!--  -->
    <!-- ? Main CSS -->
    <link rel="stylesheet" href="" />
    <link rel="stylesheet" href="/website/main-scss/main.min.css" />
    <link rel="stylesheet" href="/website/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/website/css/fontawesome.min.css" />
    <!-- ? Custom CSS -->
    <link rel="stylesheet" href="/website/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="/website/sass/style.min.css" />
    <!-- ? Custom CSS -->
    <!-- ? Main JavaScript -->
    <script src="/website/js/jquery-3.5.1.min.js"></script>
    <script src="/website/js/bootstrap.min.js"></script>
    <script src="/website/js/all.min.js"></script>
    <script src="/website/js/fontawesome.min.js"></script>
    <!-- ? Main JavaScript -->
    <!-- ? Custom JavaScript -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="/website/js/charts.js"></script>
    <script src="/website/js/jquery.dataTables.min.js"></script>
    <script src="/website/js/dataTables.bootstrap5.min.js"></script>
    <!-- ? Custom JavaScript -->

    <title>Aflak Home</title>
  </head>
  <body>
    <div class="home">
      <!-- header -->
      <header>
        <div class="container">
          <div class="socia-media">
            <div class="logo">
              <a href="{{ $setting->facebook ?? '' }}"> <i class="fa-brands fa-facebook-f"></i></a>
              <a href="{{ $setting->twitter ?? '' }}"> <i class="fa-brands fa-twitter"></i></a>
              <a href="{{ $setting->linkedin ?? '' }}"> <i class="fa-brands fa-linkedin"></i></a>
              <a href="{{ $setting->youtube ?? '' }}"> <i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="phones">
              <a >
                <p>
                    @if($setting !== null && $setting->address !== null)
                        {{ $setting->translate(LaravelLocalization::getCurrentLocale())->address }}
                    @endif
                    <i class="fa-solid fa-location-dot"></i>
                </p>

              </a>
              <a >
                <p>
{{$setting->email ?? ''}}                  <i class="fa-regular fa-envelope"></i></p
              ></a>

              <a href="#">
                <p>{{ $setting->phone ?? '' }} <i class="fa-solid fa-phone-flip"></i></p
              ></a>
            </div>
          </div>
        </div>
      </header>

<section class="nav-bar">
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="img">
              <img src="img/title.png" alt="" />
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/"
                  >Home</a
                >
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about_us">About Us</a>
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services">Services</a>
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog">Blogs</a>
                <div class="point"></div>
              </li>
            </ul>
            <div class="chose-languge">
              <div class="dropdown">
                <a
                  class="dropdown-toggle"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  English
                  <img src="img/en.png" alt="" />
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                    <a class="dropdown-item" href="#"
                      >AR <img src="img/download.jfif" alt=""
                    /></a>
                  </li>
                  <li><a class="dropdown-item" href="#">Another languge</a></li>
                </ul>
              </div>
              <a href="contact_us"
                ><button type="button" class="btn btn-secondary">
                  Contact Us
                </button></a
              >
            </div>
          </div>
        </div>
      </nav>
        <div class="container">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="img"><img src="img/title.png" alt="" /></div>

            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="About-Us.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('services') }}">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
              </li>
            </ul>
            <div class="chose-languge">
              <div class="dropdown">
                <a
                  class="dropdown-toggle"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  English
                  <img src="img/en.png" alt="" />
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                    <a class="dropdown-item" href="#"
                      >AR <img src="img/download.jfif" alt=""
                    /></a>
                  </li>
                  <li><a class="dropdown-item" href="#">Another languge</a></li>
                </ul>
              </div>
              <a href="contact-us.html"
                ><button type="button" class="btn btn-secondary">
                  Contact Us
                </button></a
              >
            </div>
          </div>
        </div>
      </nav>
</section>


@section('script')
  {{-- <script>
    function logout(form) {
      //   var formData = new FormData($('#login')[0]);
      var url = "{{ route('logout') }}";
      console.log(url);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      });

      $.ajax({
        type: 'POST',
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting contentType
        url: url,
        dataType: "Json",
        success: function(result) {
          console.log(result);
          if (result.status == true) {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: result.message,
            }).then(() => {
              window.location.href = "{{ route('home') }}";
            });
          }
        },
        error: function(xhr, status, error) {
          // If error, handle validation errors and display them
          var errors = xhr.responseJSON.errors;
          console.log(errors);
          $.each(errors, function(key, value) {
            console.log(key, value);
            $('#' + key).addClass('is-invalid');
            $('#' + key + '_error').text(value);
          });
        }
      });

    }
  </script> --}}
@endsection


<style>
    .nav-bar {
        position: sticky;
    top: 0;
    z-index: 1020;
}
.navbar .chose-languge .dropdown {
    margin-right: 1.5rem;
    margin-left: 1.5rem;
}
</style>

<section
class="nav-bar">
    <nav class="navbar navbar-expand-lg">
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
              <img src="/website/img/title.png" alt="" />
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/"
                  >{{ __('messages.home') }}</a
                >
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about_us">{{ __('messages.about_us') }}</a>
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services">{{ __('messages.services') }}</a>
                <div class="point"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog">{{ __('messages.blogs') }}</a>
                <div class="point"></div>
              </li>
            </ul>
            <div class="chose-languge">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      @if (app()->getLocale() == 'en')
                        EN <img src="/website/img/en.png" alt="" />
                      @else
                        AR <img src="/website/img/download.jfif" alt=""
                        />
                      @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                          <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }} <img {{ $localeCode == 'en' ? 'src=/website/img/en.png' : 'src=/website/img/download.jfif' }} alt="" />

                          </a>
                        </li>
                      @endforeach

                    </ul>
                  </div>
              <a href="contact_us"
                ><button type="button" class="btn btn-secondary">
                 {{__('messages.contact_us')}}
                </button></a
              >
            </div>
          </div>
        </div>
      </nav>

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

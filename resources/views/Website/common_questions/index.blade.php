@extends('Website.website_layouts.index')

<style>

</style>

@section('content')

<div class="explain-company">
    <div class="container">
        <div class="row">
            <div class="contant">
                <h4>{{ __('messages.common_questions') }}</h4>
            </div>
            @foreach ($common_questions as $key => $common_question)
                <div class="accordion" id="accordionExample{{ $key }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $key }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                {{ $common_question->question  ?? ''}}
                            </button>
                        </h2>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}"
                            data-bs-parent="#accordionExample{{ $key }}">
                            <div class="accordion-body">
                                <p>
                                    {{ $common_question->answer  ?? ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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

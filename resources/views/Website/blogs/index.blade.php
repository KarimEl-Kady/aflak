@extends('Website.website_layouts.index') .Related-posts

<style>

div#card-mou {
    height: 251px;
    width: 100%;
    overflow: hidden;
}
.our-blog-page .Related-posts .section .img img {
    width: 118px !important;
    height: 84px !important;
    border-radius: 10px;
}
.one-tag {
    width: fit-content !important;
    height: fit-content !important;
    padding: 0.5rem !important;
}
.one-tag h4 {
    font-size: 0.9rem;
}
</style>

@section('content')


    <!-- our blog page -->
    <div class="our-blog-page">
        <div class="head-blog">
          <div class="container">
            <p>{{ __('messages.home') }} <span>. {{ __('messages.blog') }}</span></p>
            <h4>{{ __('messages.blog') }}</h4>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12" data-aos="fade-right">
              <div class="sections">
                <h6>{{ __('messages.sections')}}</h6>
                <ul>
                    @foreach ($sections as $section )

                    @endforeach
                    <li>{{ $section->title  ?? ''}}</li>

                </ul>
              </div>
              <div class="Related-posts">
                <h6>{{ __('messages.related_posts') }}</h6>

                @foreach ($posts as $post )

                <div class="section">
                    <div class="img"><img src="{{ $post->image_link }}" alt="" /></div>
                  <div class="contant">
                    <h6>
                      {{$post->title}}
                    </h6>
                    <p>{{ substr($post->description, 0, 15) }} ...</p>
                </div>
                </div>

                @endforeach
              </div>
              <div class="Tags">
                <h6>{{ __('messages.hashtags') }}</h6>
                <div class="head">
                    @foreach ($hashtags as $hashtag )

                    <div class="one-tag">
                        <h4>{{ $hashtag->title }}</h4>
                    </div>

                    @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
              <div class="row" >

                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row" >
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-6" >


                                <div class="card-plog" id="card-mou" data-aos="zoom-in-up" data-aos-duration="1000">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        <div class="img">
                                            <img src="{{ $blog->image_link ?? ''}}" alt="" style="border-radius: 10px;"/>
                                            <div class="date">
                                                <h5>{{ $blog->created_at->format('d')  ?? ''}}</h5>
                                                <p>{{ $blog->created_at->formatLocalized('%B')  ?? ''}}</p>
                                            </div>
                                        </div>
                                        <h4>{{ $blog->title  ?? ''}}</h4>
                                        <p>{{ (substr($blog->description,0,30). '..' ) ?? ''}}</p>
                                        <h6>{{ __('messages.read_more') }}</h6>
                                    </a>
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>



                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <div class="page-contant">
                            @if ($blogs->onFirstPage())
                                <li class="page-item disabled">
                                    <span aria-hidden="true">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a href="{{ $blogs->previousPageUrl() }}" aria-label="Previous" class="circle-btn">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif
                        </div>

                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            <div class="page-contant">
                                <li class="page-item {{ $page == $blogs->currentPage() }}">
                                    <a href="{{ $url }}" class="circle-btn">{{ $page }}</a>
                                </li>
                            </div>
                        @endforeach

                        <div class="page-contant">
                            @if ($blogs->hasMorePages())
                                <li class="page-item">
                                    <a href="{{ $blogs->nextPageUrl() }}" aria-label="Next" class="circle-btn">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span aria-hidden="true">&raquo;</span>
                                </li>
                            @endif
                        </div>
                    </ul>

                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- our blog page -->

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

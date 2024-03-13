@extends('Website.website_layouts.index')

<style>

</style>

@section('content')


    <!-- our blog page -->
    <div class="our-blog-page">
        <div class="head-blog">
          <div class="container">
            <p>HOME <span>. Blogs</span></p>
            <h4>our Blogs</h4>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12" data-aos="fade-right">
              <div class="sections">
                <h6>sections</h6>
                <ul>
                    @foreach ($sections as $section )

                    @endforeach
                    <li>{{ $section->title  ?? ''}}</li>

                </ul>
              </div>
              <div class="Related-posts">
                <h6>Related posts</h6>

                @foreach ($posts as $post )

                <div class="section">
                    <div class="img"><img src="{{ $post->image_link }}" alt="" /></div>
                  <div class="contant">
                    <h6>
                      {{$post->title}}
                    </h6>
                    <p>{{ substr($post->text, 0, 15) }} ...</p>
                </div>
                </div>

                @endforeach
              </div>
              <div class="Tags">
                <h6>Tags</h6>
                <div class="head">
                    @foreach ($hashtags as $hashtag )

                    <div class="one-tag">{{ $hashtag->title }}</div>

                    @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
              <div class="row">
                {{-- <div class="col-lg-6 col-md-12 col-12" >
                  <div class="card-plog" data-aos="zoom-in-left">
                    <a href="read-blog.html">
                      <div class="img">
                        <img src="img/pagblog2.png" alt="" />
                        <div class="date">
                          <h5>23</h5>
                          <p>Jan</p>
                        </div>
                      </div>
                      <h4>
                        How To Implement Sustainability In Inventory Management
                      </h4>
                      <p>
                        As the world’s leading logistics company, we have a
                        responsibility to set an example in our industry and be a
                        sustainability leader. That means reducing our carbon
                        footprint and setting the highest social and governance
                        standards.
                      </p>
                      <h6>show more</h6>
                    </a>
                  </div>
                  <div class="card-plog" data-aos="zoom-in-left">
                    <a href="read-blog.html">
                      <div class="img">
                        <img src="img/pagblog3.png" alt="" />
                        <div class="date">
                          <h5>23</h5>
                          <p>Jan</p>
                        </div>
                      </div>
                      <h4>
                        How To Implement Sustainability In Inventory Management
                      </h4>
                      <p>
                        As the world’s leading logistics company, we have a
                        responsibility to set an example in our industry and be a
                        sustainability leader. That means reducing our carbon
                        footprint and setting the highest social and governance
                        standards.
                      </p>
                      <h6>show more</h6>
                    </a>
                  </div>
                  <div class="card-plog" data-aos="zoom-in-left">
                    <a href="read-blog.html">
                      <div class="img">
                        <img src="img/pagblog6.png" alt="" />
                        <div class="date">
                          <h5>23</h5>
                          <p>Jan</p>
                        </div>
                      </div>
                      <h4>
                        How To Implement Sustainability In Inventory Management
                      </h4>
                      <p>
                        As the world’s leading logistics company, we have a
                        responsibility to set an example in our industry and be a
                        sustainability leader. That means reducing our carbon
                        footprint and setting the highest social and governance
                        standards.
                      </p>
                      <h6>show more</h6>
                    </a>
                  </div>
                </div> --}}
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-6">


                                <div class="card-plog" id="card-mou" data-aos="zoom-in-up" data-aos-duration="1000">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        <div class="img">
                                            <img src="{{ $blog->image_link ?? ''}}" alt="" />
                                            <div class="date">
                                                <h5>{{ $blog->created_at->format('d')  ?? ''}}</h5>
                                                <p>{{ $blog->created_at->formatLocalized('%B')  ?? ''}}</p>
                                            </div>
                                        </div>
                                        <h4>{{ $blog->title  ?? ''}}</h4>
                                        <p>{{ $blog->description  ?? ''}}</p>
                                        <h6>{{ __('messages.read_more') }}</h6>
                                    </a>
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>

                {{-- <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <div class="page-contant"> <li class="page-item"><a class="page-link" href="#">1</a></li></div>
                    <div class="page-contant"><li class="page-item"><a class="page-link" href="#">2</a></li></div>
                    <div class="page-contant"><li class="page-item"><a class="page-link" href="#">3</a></li></div>
                    <div class="page-contant">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </nav> --}}

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <div class="page-contant">
                            @if ($blogs->onFirstPage())
                                <li class="page-item disabled">
                                    <span  aria-hidden="true">&laquo; </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a  href="{{ $blogs->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif
                        </div>

                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            <div class="page-contant">
                                <li class="page-item {{ $page == $blogs->currentPage()}}">
                                    <a  href="{{ $url }}">{{ $page }}</a>
                                </li>
                            </div>
                        @endforeach

                        <div class="page-contant">
                            @if ($blogs->hasMorePages())
                                <li class="page-item">
                                    <a  href="{{ $blogs->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span  aria-hidden="true">&raquo;</span>
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

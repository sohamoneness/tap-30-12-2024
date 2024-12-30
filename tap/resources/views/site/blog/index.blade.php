@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="pb-0 blog_header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-5">
                    <div class="title_area">
                        <h3 class="m-0">{!! $article_page_content->header_left !!}</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="title_area">
                        <h4 class="m-0">{!! $article_page_content->header_right !!}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <ul class="filter_list m-0 justify-content-start">
                <li><h5>Filter by:</h5></li>
                @foreach($cat as $key => $data)
                <li><label><a href="?category={{ $data->slug}}"><span>{{  ucwords($data->title) }}</span></a></label></li>
                @endforeach
                
            </ul>

            <div class="row">
            	@foreach($blogs as $key => $blog)
                <div class="col-sm-4">
                  <div class="blog_area">
                    <figure>
                      <img src="{{ asset($blog->image) }}">
                      @foreach (CategoryNames($blog->article_category_id) as $item)
                      <div class="meta_cat"><a href="#">{{$item}}</a></div>     
                      @endforeach
                      
                    </figure>
                    <figcaption>
                      <h4><a href="{{ route('sitenew.article.details',$blog->slug) }}">{{ $blog->title }}</a></h4>
                      <p>{!! $blog->short_desc !!}</p>
                      <div class="d-block text-end"><a href="{{ route('sitenew.article.details',$blog->slug) }}" class="learn_btn">Learn More</a></div>
                    </figcaption>
                  </div>
                </div>
                @endforeach
                
              </div>
        </div>
    </section>

    

    

    <section class="cat_section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-5 text-center">
            <div class="title_area">
              <h5 class="text-white">There’s never been a better time to start writing.</h5>
              <h2 class="text-white">JOIN THE <span>COMMUNITY</span></h2>
              <p>Our community welcomes writers from all walks of life - if you’re ready to learn, you’re in the right place.</p>
              <div class="d-block">
                <a href="#" class="theme_btn">Subscribe Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
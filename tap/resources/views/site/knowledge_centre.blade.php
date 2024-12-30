@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>Knowledge Centre</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Knowledge Centre</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing_section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-4">
                    <div class="title_area pe-5">
                        <h2>Latest Blogs & <span>Articles</span></h2>
                        <p>Get the latest tips and insights on personal loans, our team and other interesting topics.</p>
                        <a href="{!! URL::to('v2/blog') !!}" class="theme_btn">See All Articles</a>
                    </div>
                </div>
                <!--<div class="col-sm-4">-->
                <!--    <div class="blog_area mt-3 m-sm-0">-->
                <!--        <figure>-->
                <!--            <img src="{{ asset('site/images/blog2.png')}}">-->
                <!--        </figure>-->
                <!--        <figcaption>-->
                <!--            <h4><a href="#">Top 16 Copywriting Trends for 2023</a></h4>-->
                <!--            <p>Being ahead of the game when it comes to copywriting will give you an edge over the competition.</p>-->
                <!--        </figcaption>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-sm-4">-->
                <!--    <div class="blog_area mt-3 m-sm-0">-->
                <!--        <figure>-->
                <!--            <img src="{{ asset('site/images/blog1.png')}}">-->
                <!--        </figure>-->
                <!--        <figcaption>-->
                <!--            <h4><a href="#">How to Use the 8-Step Writing Process</a></h4>-->
                <!--            <p>This is a walk through with the eight stages of the writing process and how to separate them from each other for optimal results.</p>-->
                <!--        </figcaption>-->
                <!--    </div>-->
                <!--</div>-->
                @foreach($blogs as $key => $blog)
                <div class="col-sm-4">
                  <div class="blog_area">
                    <figure>
                      <img src="{{ asset($blog->image) }}">
                      @foreach (CategoryNames($blog->article_category_id) as $item)
                      <!--<div class="meta_cat"><a href="#">{{$item}}</a></div>     -->
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
    
    <section class="feature_tool_section">
      <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
          <h2>Featured <span>Tools</span></h2>
          <p>Get the latest tips and insights on personal loans, our team and other interesting topics.</p>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <a href="#" class="tools_block featured">
              <img src="{{ asset('site/images/tools_arrow.png')}}" class="tools_arrow">
              <figure>
                <img src="{{ asset('site/images/surfer.png')}}">
              </figure>
              <h4>Surfer SEO</h4>
              <p>Surfer SEO is a tool to help users research, write, optimize, and audit! Everything you need to crea</p>
            </a>
          </div>
          <div class="col-sm-4">
            <a href="#" class="tools_block featured">
              <img src="{{ asset('site/images/tools_arrow.png')}}" class="tools_arrow">
              <figure>
                <img src="{{ asset('site/images/Yoast_Icon_Large_RGB 1.png')}}">
              </figure>
              <h4>Yoast SEO</h4>
              <p>Yoast Wordpress SEO Plugins are a set of tools developed by Joost de Valk and team, founder of yoast</p>
            </a>
          </div>
          <div class="col-sm-4">
            <a href="#" class="tools_block featured">
              <img src="{{ asset('site/images/tools_arrow.png')}}" class="tools_arrow">
              <figure>
                <img src="{{ asset('site/images/logo-promo-128 1.png')}}">
              </figure>
              <h4>Stack Edit</h4>
              <p>StackEdit is an amazing in-browser editing and content writing tool that helps you deliver great art</p>
            </a>
          </div>

          <div class="col-12 text-center mt-2 mt-sm-4">
            <a href="{!! URL::to('v2/tools') !!}" class="theme_btn">See All Tools</a>
          </div>
        </div>
        
      </div>
    </section>

    <section class="center_section">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="center_block bg_faq">
              <figure>
                <img src="{{ asset('site/images/help (1) 1.png')}}">
              </figure>
              <h4>FAQ's</h4>
              <a href="{!! URL::to('v2/faqs') !!}">Find answers <img src="{{ asset('site/images/arrow-up-right.svg')}}"></a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="center_block bg_glossary">
              <figure>
                <img src="{{ asset('site/images/dictionary 1.png')}}">
              </figure>
              <h4>Glossary</h4>
              <a href="{!! URL::to('v2/glossary') !!}">Explore More <img src="{{ asset('site/images/arrow-up-right.svg')}}"></a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="center_block bg_scenarios">
              <figure>
                <img src="{{ asset('site/images/action-plan 1.png')}}">
              </figure>
              <h4>Scenarios</h4>
              <a href="#">Explore More <img src="{{ asset('site/images/arrow-up-right.svg')}}"></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="cat_section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 text-center">
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
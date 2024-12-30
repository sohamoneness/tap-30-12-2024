@extends('site.layouts.app2')
@section('title', 'FAQs')
@section('section')
    <section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>We’re here to help.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto officiis explicabo necessitatibus optio accusantium similique aliquid quo quaerat dolor quibusdam!</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                    <form id="searchForm" method="GET" >
                        <input type="search" name="search" value="{{$search}}" class="search_box" placeholder="Search your post here...">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="small faq_category">
        <div class="container">
            <h5 class="section_title text-center mt-0">Browse All Categories</h5>
            <div class="row g-5">
              @forelse ($categories as $category)
              <div class="col-sm-4">
                  <div class="faqcat_block">
                      <h5>{{$category->title}}</h5>
                      <p>{{$category->description}}</p>
                      <a href="{{ route('sitenew.faqs-details', $category->id) }}">Learn More</a>
                  </div>
              </div>
              @empty
                  <p>No such categories found !!!</p>
              @endforelse
            	
            </div>
            <div class="clearfix"></div>
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
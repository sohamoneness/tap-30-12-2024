@extends('site.layouts.app2')
@section('title', 'FAQ Details')
@section('section')
    <section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>We’re here to help.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto officiis explicabo necessitatibus optio accusantium similique aliquid quo quaerat dolor quibusdam!</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Getting Started</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                    <form>
                        <input type="search" class="search_box" placeholder="Search your post here...">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="small faq_category">
        <div class="container">
            <div class="row g-5">
                <div class="col-sm-4">
                    <ul class="topic_list">
                        @forelse ($categories as $category)
                        <li @if($id == $category->id) class="active" @endif>
                            <a href="{{ route('sitenew.faqs-details', $category->id) }}">{{$category->title}}</a>
                        </li>
                        @empty
                            
                        @endforelse
                        
                        
                    </ul>
                </div>
                <div class="col-sm-8">

                    @php
                        $i = 1;
                    @endphp
                    
                    @forelse ($data as $item)

                    @php
                        if($i<9){
                            $i = '0'.$i;
                        }   
                    @endphp
                        
                    
                    <div class="accordian_box">
                        <h5><span>{{$i}}.</span> {{$item->question}}</h5>
                        <div class="accordian_content">
                            {!! $item->answer !!}
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @empty
                    <p>No record found !!!</p>
                        
                    @endforelse
                    
                </div>
            </div>

            <h5 class="section_title">Related Categories</h5>
            <div class="row g-5">
                @forelse ($related_category as $item)
                

                @php
                    
                @endphp
                <div class="col-sm-4">
                    <div class="faqcat_block">
                        <h5>{{$item->title}}</h5>
                        <p>{{$item->description}}</p>
                        <a href="{{ route('sitenew.faqs-details', $item->id) }}">Learn More</a>
                    </div>
                </div>
                @empty
                <p>No such related categories there !!!</p>
                    
                @endforelse
                
                
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
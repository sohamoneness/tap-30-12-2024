@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>One platform for all your needs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Features</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_blocks">
        <div class="container">
            <div class="row g-3">
            	@foreach($features1 as $f)
                <div class="col-sm-3">
                    <div class="feature_heading">
                        {{$f->title}}
                    </div>
                    <div class="feature_content">
                        <ul>
                        	@foreach($f->details as $detail)
                            <li><a href="{!! URL::to('v2/feature-details/'.$f->slug) !!}">{{$detail->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-sm-3">
                    <div class="feature_heading">
                        Project Management & Collaboration:
                    </div>
                    <div class="feature_content">
                        <ul>
                            <li><a href="#">Job Board</a></li>
                            <li><a href="#">Client Communication</a></li>
                            <li><a href="#">Invoicing & Payment</a></li>
                            <li><a href="#">CRM Features</a></li>
                            <li><a href="#">Portfolio Building</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="feature_heading">
                        Professional Development & Resources:
                    </div>
                    <div class="feature_content">
                        <ul>
                            <li><a href="#">Job Board</a></li>
                            <li><a href="#">Client Communication</a></li>
                            <li><a href="#">Invoicing & Payment</a></li>
                            <li><a href="#">CRM Features</a></li>
                            <li><a href="#">Portfolio Building</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="feature_heading">
                        Marketplace<br/>& Networking:
                    </div>
                    <div class="feature_content">
                        <ul>
                            <li><a href="#">Job Board</a></li>
                            <li><a href="#">Client Communication</a></li>
                            <li><a href="#">Invoicing & Payment</a></li>
                            <li><a href="#">CRM Features</a></li>
                            <li><a href="#">Portfolio Building</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    @foreach($features as $f)
    <section class="feature_list">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 me-auto"> 
                    <h2><a href="{!! URL::to('v2/feature-details/'.$f->slug) !!}" style="display: block; text-decoration: none; color: #000;">{{$f->title}}:</a></h2>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                    	@foreach($f->details as $detail)
                        <div class="col-sm-6">
                            <div class="feature_meta">
                                <h4>{{$detail->title}}</h4>
                                <p>{{$detail->sub_title}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    
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
@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('section')

<section class="portfolio-v4-info pt-0">
    <div class="container">
        <figure class="cover_image">
            <img src="{{ asset($data->user->banner_image) }}">
        </figure>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-12 portfolio-v4-info-right">
                <div class="profile_image">
                    <figure>
                        <img src="{{ asset($data->user->image) }}" alt="" />
                    </figure>                        
                </div>

                <div class="row">
                    <div class="col-sm-9 profile_excerpt">
                        <div class="profile_meta">
                            <h2>{{ $data->user->first_name.' '.$data->user->last_name }}</h2>
                            
                            <div class="country">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{$data->user->country}}</span>
                            </div>
                        </div>
                        <h5>{{$data->user->occupation}}</h5>
                        <p>{{$data->user->short_desc}}</p>
                    </div>
                    <div class="col-sm-3">
                        <a href="tel:{{$data->user->mobile}}" class="theme_btn"><i class="fa-solid fa-phone"></i><span class="ms-2">{{$data->user->mobile}}</span></a>
                        @if($data->user->intro_video)
                        <a class="profile_video_btn" data-fancybox href="#contentVideo" type="video/mp4">
                            <svg width="28px" height="28px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" style="    background-color: #95C800;border-radius: 50%;padding: 5px;">
                                <path d="M5.25 5.5C3.45507 5.5 2 6.95508 2 8.75V19.25C2 21.0449 3.45507 22.5 5.25 22.5H14.75C16.5449 22.5 18 21.0449 18 19.25V8.75C18 6.95507 16.5449 5.5 14.75 5.5H5.25Z" fill="#212121"/>
                                <path d="M23.1232 20.6431L19.5 17.0935V10.9989L23.1121 7.3706C23.8988 6.58044 25.248 7.13753 25.248 8.25251V19.7502C25.248 20.8577 23.9143 21.4181 23.1232 20.6431Z" fill="#212121"/>
                            </svg>
                        </a>
                        <video width="640" height="320" controls id="contentVideo" style="display:none;">
                            <source src="{{ asset($data->user->intro_video) }}" type="video/mp4">
                        </video>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if($data->socialMedias)
                    <div class="socials">
                        @foreach ($data->socialMedias as $socialMedia)
                            <a href="{{ $socialMedia->link }}" target="_blank">
                                {!! $socialMedia->socialMediaDetails ? $socialMedia->socialMediaDetails->icon : '' !!}
                            </a>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="language">
                    <span>Language</span>
                </div>
                @if($data->languages)
                <div class="view-lang">
                    <ul class="skill_list">
                        @foreach ($data->languages as $language)
                            <li>{!! $language->languageDetails ? $language->languageDetails->name : '' !!}</li>
                        @endforeach
                    </ul>
                </div>
                @else
                <p class="small">No languages found</p>
                @endif
                @if(!empty($data->user->quote))
                <div class="language">
                    <span>Favourite Quote</span>
                </div>
                <div class="view-lang">
                    <blockquote>
                        <img src="{{ asset('site/images/quote.svg') }}">
                        <h5>{{$data->user->quote}}</h5>
                        @if(!empty($data->user->quote_by))
                        <p class="w-100 text-right">- {{$data->user->quote_by}}</p>
                        @endif
                    </blockquote>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<section class="portfolio-v4-category">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="portfolio_list list-unstyled p-0 m-0">
                    <li class="portv4-tab port-tab active" data-port="portfolio">
                        Portfolio
                    </li>
                    <li class="portv4-tab port-tab" data-port="specialities">
                        Specialities
                    </li>
                    <li class="portv4-tab port-tab" data-port="worked-for">
                        Who I&apos;ve Worked For
                    </li>
                    <li class="portv4-tab port-tab" data-port="categories">
                        Categories
                    </li>
                    <li class="portv4-tab port-tab" data-port="private-articles">
                        Private Articles
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            @forelse ($data->portfolios as $portfolio)
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item active" id="portfolio">
                <div class="blog_area">
                    <figure>
                        <img src="{{ asset($portfolio->image) }}" alt="" />
                        <div class="meta_cat">
                            {{ $portfolio->category }}
                        </div>
                    </figure>
                    <figcaption>
                        <h4><a href="{{ $portfolio->link }}" target="_blank">{{$portfolio->title}}</a></h4>
                        {!! portfolioTagsHtml($portfolio->id) !!}
                        <p>{{ substr($portfolio->short_desc,0,100) }}</p>

                        <div class="d-block text-end"><a href="{{ $portfolio->link }}" class="learn_btn">Learn More</a></div>
                    </figcaption>
                    <!-- <div class="market-research-date">
                        <div class="market-research-badge"></div>
                        <h6>{{ date('j M, Y', strtotime($portfolio->created_at)) }}</h6>
                    </div>
                    <div class="marker-research-info">
                         
                         <p>{{ substr($portfolio->short_desc,0,100) }} @if(strlen($portfolio->short_desc)>100)<small class="text-underline text-primary text-lowercase showMore" style="cursor: pointer">more...</small>@endif</p>
                         <p style="display: none;">{{ $portfolio->short_desc }} @if(strlen($portfolio->short_desc)>100)<small class="text-underline text-primary text-lowercase showLess" style="cursor: pointer">less</small>@endif</p>
                    </div> -->
                </div>
            </div>
            @empty
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item">
                {{-- <div class="market-research-content"> --}}
                    <p class="small text-light">No portfolio found</p>
                {{-- </div> --}}
            </div>
            @endforelse


            @forelse ($data->private_article as $pArticle)
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item" id="private-articles">
                <div class="blog_area">
                    <figure>
                        <img src="{{ asset($pArticle->image) }}" alt="" />

                        <div class="meta_cat">
                            {{ $pArticle->category }}
                        </div>
                    </figure>
                    <figcaption>
                        <h4><a href="{{ route('front.portfolio.private-articles.detail', $pArticle->slug) }}" target="_blank">{{$pArticle->title}}</a></h4>
                        {!! portfolioTagsHtml($pArticle->id) !!}
                        <p>{{ substr($pArticle->short_desc,0,100) }}</p>

                        <div class="d-block text-end"><a href="{{ route('front.portfolio.private-articles.detail', $pArticle->slug) }}" class="learn_btn">Learn More</a></div>
                    </figcaption>
                    <!-- <div class="market-research-date">
                        <div class="market-research-badge">
                            <span>{{ $pArticle->category }}</span>
                        </div>
                        <h6>{{ date('j M, Y', strtotime($pArticle->created_at)) }}</h6>
                    </div>
                    <div class="marker-research-info">
                        <a href="{{ route('front.portfolio.private-articles.detail', $pArticle->slug) }}"  class="research-link">{{$pArticle->title}}</a>
                         {!! portfolioTagsHtml($pArticle->id) !!}
                         <p>{{ substr($pArticle->short_desc,0,100) }} @if(strlen($pArticle->short_desc)>100)<small class="text-underline text-primary text-lowercase showMore" style="cursor: pointer">more...</small>@endif</p>
                         <p style="display: none;">{{ $pArticle->short_desc }} @if(strlen($pArticle->short_desc)>100)<small class="text-underline text-primary text-lowercase showLess" style="cursor: pointer">less</small>@endif</p>

                    </div> -->
                </div>
            </div>
            @empty
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item">
                {{-- <div class="market-research-content"> --}}
                    <p class="small text-light">No Private Article found</p>
                {{-- </div> --}}
            </div>
            @endforelse





            @forelse ($data->specialities as $speciality)
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item" id="specialities" style="height:290">
                <div class="market-research-content">
                    {{-- <div class="img">
                        <a href="" class="research-link"><img src="{{ asset($speciality->image) }}" alt="" /></a>
                    </div> --}}
                    <div class="market-research-date">
                        {{-- <div class="market-research-badge">
                            <span>{{ $speciality->specialityDetails->name }}</span>
                        </div> --}}
                        <h6>{{ date('j M, Y', strtotime($speciality->created_at)) }}</h6>
                    </div>
                    <div class="marker-research-info">
                        <h4><a href="" class="research-link">{{ ucwords($speciality->specialityDetails->name) }}</a></h4>
                        <p>{{ substr($speciality->description,0,100) }} @if(strlen($speciality->description)>100)<small class="text-underline text-primary text-lowercase showMore" style="cursor: pointer">more...</small>@endif</p>
                         <p style="display: none;">{{ $speciality->description }} @if(strlen($speciality->description)>100)<small class="text-underline text-primary text-lowercase showLess" style="cursor: pointer">less</small>@endif</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item">
                {{-- <div class="market-research-content"> --}}
                    <p class="small text-light">No speciality found</p>
                {{-- </div> --}}
            </div>
            @endforelse

            @if ($data->user->worked_for)
                @foreach (explode(', ', $data->user->worked_for) as $worked_for)
                <div class="col-12 col-lg-4 col-md-6 portfolio-links-item" id="worked-for">
                    <div class="market-research-content">
                        <div class="marker-research-info mt-0">
                            <h4><a href="" class="research-link">{{ ucwords($worked_for) }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item">
                <p class="small text-light">No work details found</p>
            </div>
            @endif

            @if ($data->user->categories)
                @foreach (explode(', ', $data->user->categories) as $category)
                <div class="col-12 col-lg-4 col-md-6 portfolio-links-item" id="categories">
                    <div class="market-research-content">
                        <div class="marker-research-info mt-0">
                            <h4><a href="" class="research-link">{{ ucwords($category) }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-12 col-lg-4 col-md-6 portfolio-links-item">
                <p class="small text-light">No categories found</p>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- emplyment --}}
<section class="porfolio-v4-employement">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-employement-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header">
                        <h3>Employment History</h3>
                    </div>

                    @if(count($data->employments) > 0)
                    <div class="portfolio-v4-content-body">
                        @foreach ($data->employments as $employment)
                        <div class="portfolio-v4-content-list">
                            <h4>{{$employment->occupation}} | {{$employment->company_title}}</h4>
                            <span class="badge"> {{date('M Y',strtotime($employment->year_from))}} - {{$employment->year_to == '' || strtotime($employment->year_to) > strtotime(date('Y-m-d')) ? 'Present' : date('M Y',strtotime($employment->year_to))}} </span>
                            <p>{{$employment->short_desc}}</p>
                            @if($employment->link == '')
                            @else
                                <p><a href="{{$employment->link}}" target="_blank">{{$employment->link}}</a></p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="portfolio-v4-education-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="small">No employment found</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- clients --}}
<section class="porfolio-v4-employement porfolio-v4-client">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-client-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header">
                        <h3>Manage Clients</h3>
                    </div>

                    @if(count($data->clients) > 0)
                    <div class="portfolio-v4-content-body">
                        @foreach ($data->clients as $client)
                        <div class="portfolio-v4-content-list">
                            <div class="portfolio-v4-client-flex">
                                <figure>
                                    <img src="{{ asset($client->image) }}" alt="" />
                                </figure>
                                <div class="portfolio-v4-client-info">
                                    <h4>{{$client->client_name}}</h4>
                                    <span>{{$client->occupation}}</span>
                                    <p class="mb-0">{{$client->company_name}}</p>
                                    <a href="{{$client->link}}" target="_blank" class="mb-0">{{$client->link}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="portfolio-v4-education-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="small">No clients found</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- education --}}
<section class="porfolio-v4-employement porfolio-v4-education">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-education-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header mb-4">
                        <h3>Education</h3>
                    </div>

                    @if(count($data->educations) > 0)
                    <div class="portfolio-v4-education-body">
                        <div class="row g-3">
                            @foreach ($data->educations as $education)
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="portfolio-v4-education-info">
                                    <h4> {{$education->college_name}} </h4>
                                    <p><span class="designation">{{$education->degree}}</span></p>
                                    <p><span class="year">Year {{ date('Y', strtotime($education->year_from))}} - {{date('Y', strtotime($education->year_to)) }}</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="portfolio-v4-education-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="small">No education found</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- rating --}}
<section class="porfolio-v4-employement porfolio-v4-feedback-rating">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-education-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header">
                        <h3>Feedback Rating</h3>
                        {{-- <div class="add-client-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-circle-plus"></i>
                        </div> --}}
                    </div>

                    <div class="portfolio-v4-content-body">
                        @foreach($data->feedback as $key => $item)
                        <div class="portfolio-v4-rating-list">

                            <div class="portfolio-v4-rating-flex">
                                {!! RatingHtml($item->rating) !!}
                                <div>{{ date('j M, Y', strtotime($item->date_from)) }}</div>
                            </div>
                            <h4>{{ $item->title }}</h4>
                            <p>{{ $item->description }}</p>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- testimonial --}}
<section class="porfolio-v4-employement porfolio-v4-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-testimonial-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header">
                        <h3>Testimonials</h3>
                    </div>

                    @if (count($data->testimonials) > 0)
                    <div class="portfolio-v4-testimonials-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mySwiper portfolio-v4-testimonials">
                                    <div class="swiper-wrapper">
                                        @foreach ($data->testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="port-v4-testi-content">
                                                <p>{{$testimonial->short_testimonial}}</p>
                                                <div class="author_meta">
                                                    <figure>
                                                        <img src="{{ asset($testimonial->image) }}" alt="">
                                                    </figure>
                                                    <figcaption>
                                                        <h4>{{$testimonial->client_name}}</h4>
                                                        <span>-{{$testimonial->occupation}}</span>
                                                    </figcaption>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="portfolio-v4-testimonials-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="small">No testimonials yet</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- certification --}}
<section class="porfolio-v4-employement porfolio-v4-certification">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="porfolio-v4-certification-content portfolio-v4-content">
                    <div class="portfolio-v4-content-header">
                        <h3>Certification</h3>
                        <div class="add-client-btn" data-bs-toggle="modal"
                        data-bs-target="#exampleModal3">

                        </div>
                    </div>

                    @if (count($data->certificates) > 0)
                    <div class="portfolio-v4-testimonials-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="certificate_slider portfolio-v4-testimonials">
                                    <div class="swiper-wrapper">
                                        @foreach ($data->certificates as $certificate)
                                        <div class="swiper-slide">
                                            <div class="port-v4-testi-content port-v4-certi-content">
                                                <p>{{$certificate->short_desc}}</p>

                                                <div class="author_meta">
                                                    <figure>
                                                        <img src="{{ asset($certificate->file) }}" alt="">
                                                    </figure>
                                                    <figcaption>
                                                        <h4>{{$certificate->certificate_title}}</h4>
                                                        <span>-{{$certificate->certificate_type}}</span>
                                                    </figcaption>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="portfolio-v4-testimonials-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="small">No certificates yet</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- contact me --}}
<section class="portfolio-v4-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 m-auto">
                <div class="calltoaction_section">
                    <div class="title_area">
                        <h6 class="text-white">contact me</h6>
                        <h2>{{ $data->user->email }}</h2>
                        <h4 class="text-white">Sign up to our newsletter to receive the latest updates</h4>
                    </div>
                    <div class="banner-input">
                        <form action="">
                            <input type="text" class="form-control" placeholder="Your e-mail address..">
                            <button type="submit"><i class="fa-brands fa-telegram"></i> Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal-rating">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add a Rating</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-info mt-3">
                        <h5>Lorem ipsum dolor sit.</h5>
                        <ul class="list-unstyled p-0 m-0">
                            <li>
                                <div class="stars reviews-stars">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="star-name">
                                    <span>reviews</span>
                                </div>
                            </li>
                            <li>
                                <div class="stars ratings-stars">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="star-name">
                                    <span>ratings</span>
                                </div>
                            </li>
                            <li>
                                <div class="stars course-completed-stars">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="star-name">
                                    <span>no. of course completed</span>
                                </div>
                            </li>
                            <li>
                                <div class="stars activity-stars">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="star-name">
                                    <span>activity</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="rating-score">
                        <h5>Total Score: <span class="score">0</span></h5>
                    </div>
                    <div class="rating-feedback-form">
                        <h4>
                            Share your experience with this client to the community:
                        </h4>
                        <form action="">
                            <textarea name="" id="" cols="30" rows="6" class="form-control"></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-testimonial">
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Add Testimonial
                    </h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group mb-2">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Ex..John Doe" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Designation</label>
                            <input type="text" class="form-control" placeholder="Ex..Writer" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Upload Image</label>
                            <input type="file" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Message</label>
                            <textarea name="" id="" cols="30" rows="6" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit">Add Testimonials</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-certification">
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Add Certification
                    </h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select name="" id="" class="form-control">
                        <option value="">Select a Certication</option>
                        <option value="">Google Digital Bootcamps</option>
                        <option value="">Surfer SEO certificate</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="add-custom" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#exampleModal4">
                        Add a custom certification
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-certification custom-certification">
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Add a custom certification
                    </h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Certification Name</label>
                                    <input type="text" class="form-control" placeholder="Ex..." />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Provider</label>
                                    <input type="text" class="form-control" placeholder="Ex..." />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <textarea name="" id="" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="">Issue Date</label>
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="">Expiration Date</label>
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Certification Id(Optional)</label>
                                    <input type="text" class="form-control" placeholder="Ex..." />
                                </div>
                            </div>

                            <div class="col-12 add-custom-certification">
                                <button type="">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
            <button class="add-custom" data-bs-dismiss="modal">Add a custom certification</button>
          </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('frontend/dist/owl.carousel.min.js') }}"></script>

     <script>
        $('.showMore').click(function(){
            $(this).parent().hide();
            $(this).parent().next().show();
        })
        $('.showLess').click(function(){
            $(this).parent().hide();
            $(this).parent().prev().show();
        })
    </script>

@endsection
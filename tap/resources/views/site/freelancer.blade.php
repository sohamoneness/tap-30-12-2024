@extends('site.layouts.app')
@section('title', 'Freelancers')
@section('section')
<section class="marketing_banner">
    <img src="{{ asset('site/images/marketing_banner.png')}}">
    <div class="container">
        <div class="row flex-sm-row-reverse align-items-center">
            <div class="col-sm-6">
                <figure>
                    <img src="{{ asset($data->image)}}">
                </figure>
            </div>
            <div class="col-sm-6">
                <div class="title_area pe-0 pe-sm-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Markets</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">{{$data->title}}</h2>
                    <p class="text-white">{!! $data->short_description !!}</p>
                    <a href="{{$data->market_btn_link}}" class="theme_btn">{{$data->market_btn}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="solution_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <div class="title_area pe-0 pe-sm-2 mb-3 mb-sm-0">
                    <h5 class="text-theme">{{$data->tag}}</h5>
                    <h2>{{$data->short_content_heading}}</h2>
                    <p>{!! $data->short_content !!}</p>
                    <a href="{{$data->short_content_btn_link}}" class="theme_btn">{{$data->short_content_btn}}</a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row gy-3 gy-sm-4">
                    @forelse ($categories as $category)                        
                    <div class="col-sm-4">
                        <div class="solution_item">
                            <figure>
                                <img src="{{ asset($category->image)}}">
                            </figure>
                            <h5>{{$category->title}}</h5>
                            <p>{{$category->category_description_heading}}</p>
                        </div>
                    </div>                        
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="title_area text-center">
                    <h2>{{$data->medium_content_heading}}</h2>
                    <div class="d-block px-sm-5 mb-sm-5">
                        <p>{!! $data->medium_content !!}</p>
                    </div>
                    {{-- <a href="#" class="theme_btn"> Join The Community</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="calltoaction_section">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="title_area">
                        <h2>{{$data->sticky_content_heading}}</h2>
                        <a href="{{$data->sticky_content_btn_link}}" class="theme_btn white large">{{$data->sticky_content_btn}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@forelse ($banners as $key => $banner)
@php
        $reverserow_class = $image_content_class = "";
        $key = $key+1;
        if($key %2 != 0){
            $reverserow_class = "flex-sm-row-reverse";
            $image_content_class = "right_image_content";
            $content_class = "pe-0 pe-sm-5";
        } else {
            $image_content_class = "left_image_content";
            $content_class = "ps-0 ps-sm-5";
        }
@endphp
    
<section class="{{$image_content_class}} pt-0">
    <div class="container">
        <div class="row align-items-center {{$reverserow_class}}">
            <div class="col-sm-6">
                <figure>
                    <img src="{{ asset($banner->image)}}">
                </figure>
            </div>
            <div class="col-sm-6">
                <div class="title_area {{$content_class}}">
                    <h2>{{$banner->content_heading}}</h2>
                    <div class="content_area">
                        {{-- <ul>
                            <li>Share your content with writers and publishers to get people talking about your blog.</li>
                            <li>Offer guest post services to leading businesses to direct traffic back to your website.</li>
                            <li>Network with professionals at copywriting events. Make your expertise unmissable.</li>
                        </ul> --}}
                        {!!  $banner->content   !!}
                    </div>
                    <a href="{!! URL::to('v2/marketplace') !!}" class="theme_btn">{{$banner->content_btn}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@empty
    
@endforelse

<section class="faq_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="title_area text-center">
                    <h2>Frequently asked <span>questions</span></h2>
                    <p>Find answers to all of your burning blog-related questions. Did we miss anything? Don’t hesitate to reach out.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @php
                    $i=1;
                @endphp
                @forelse ($faqs as $faq)
                @php
                    if($i<10){
                        $i = '0'.$i;
                    }
                @endphp
                <div class="accordian_box">
                    <h5><span>{{$i}}.</span> {{$faq->question}}</h5>
                    <div class="accordian_content">
                        {{$faq->answer}}
                    </div>
                </div>
                @php
                    $i++;
                @endphp
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</section>
<section class="cat_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                <div class="title_area">
                    <h5 class="text-white">{{$footer->title}}</h5>
                    <h2 class="text-white">{{$footer->short_desc}}</h2>
                    <p>{{$footer->btn_desc}}</p>
                    <div class="d-block">
                        <a href="{{ $footer->btn_link }}" class="theme_btn">{{$footer->btn_text}}</a>
                        <a href="{!! URL::to('v2/contact') !!}" class="theme_btn white">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>

        $(document).ready(function(){

            $('.accordian_box:first').addClass('active');

            $('.accordian_box').click(function(){

                if(!$(this).hasClass('active')) {

                    $('.accordian_box.active').removeClass('active');

                    $(this).addClass('active');

                } else {

                    $(this).removeClass('active');

                }

                //$(this).toggleClass('active');

                //$('.accordian_box').not($(this).parent().next()).removeClass('active');;

            });

        });

    </script> -->

@endsection
@extends('front.layouts.app')
@section('title', ' Tools & Features')
@section('section')
<section class="tools-details-banner">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0">
            <div class="col-12 col-md-12 col-lg-3 mb-4">
                <div class="tool-details-img-left tool-details-img">
                    <img src="assets/img/powerbi-dashboard-left.png" alt="" class="img-fluid">
                    
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-12 mb-4 m-auto text-center">
                <div class="tool-details-content">
                    <span>{{$tool->title}}</span>
                    {{-- </span>
                    <h1>Lorem ipsum dolor sit </h1>--}}
                    <p>{{$tool->category->title ??''}}</p>
                    <p>{{$tool->subcategory->title ??''}}</p>
                    {{-- <a href="javascript:void(0);" class="button text-white">Get Started Today</a> --}} 
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-3">
                <div class="tool-details-img-right">
                    <img src="assets/img/powerbi-dashboard-right.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tool-details-info1">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p>{!! $tool->description !!}</p>
                {{-- <a href="javascript:void(0);" class="button">Get Started Today</a> --}}
            </div>
        </div>
    </div>
</section>

<section class="tool-details-two-col-info1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 mb-4">
                <div class="tool-details-two-col-content tool-details-two-col-img">
                    <img src="assets/img/index.png" alt="" class="img-fluid">
                    <h2>Feature</h2>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6">
                <div class="tool-details-two-col-content">
                    <p>{!! $tool->feature !!}</p>
                    
                </div>
            </div>
        </div>

        <hr class="p-0 my-3 my-lg-4 my-md-4" style="background-color: #999;">

        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 order-1 order-lg-2 order-md-2 mb-4">
                <div class="tool-details-two-col-content tool-details-two-col-img">
                    <img src="assets/img/index.png" alt="" class="img-fluid">
                    <h2>Pros</h2>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6 order-2 order-lg-1 order-lg-1">
                <div class="tool-details-two-col-content">
                    <p>{!! $tool->pros !!}</p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- <section class="tool-details-info1 tool-details-info2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Lorem ipsum dolor sit amet, consectetur</h2>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tempor ipsum donec id elit.
                </p>
                <a href="javascript:void(0);" class="button">Get Started Today</a>
            </div>
        </div>
    </div>
</section> --}}



<section class="tool-details-two-col-info1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 mb-4">
                <div class="tool-details-two-col-content tool-details-two-col-img">
                    <img src="assets/img/index.png" alt="" class="img-fluid">
                    <h2>Cons</h2>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6">
                <div class="tool-details-two-col-content">
                    <p>{!! $tool->cons !!}</p>
                </div>
            </div>
        </div>

        <hr class="p-0 my-3 my-lg-5 my-md-5" style="background-color: #999;">

        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 order-1 order-lg-2 order-md-2 mb-4">
                <div class="tool-details-two-col-content tool-details-two-col-img">
                    <img src="assets/img/index.png" alt="" class="img-fluid">
                    <h2>Price</h2>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6 order-2 order-lg-1 order-lg-1">
                <div class="tool-details-two-col-content">
                    <p>{!! $tool->price !!}</p>
                </div>
            </div>
        </div>

    </div>
</section>
{{-- <section class="tool-details-info1 tool-details-info2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                {{-- <h2>Lorem ipsum dolor sit amet, consectetur</h2>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tempor ipsum donec id elit.
                </p> 
                <a href="javascript:void(0);" class="button">Website</a>
            </div>
        </div>
    </div>
</section> --}}


{{-- <section class="tools-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 col-md-10 m-auto">
                <div class="owl-carousel owl-theme tools-slider">
                    <div class="item">
                        <div class="tools-testimonials-content">
                            <div class="tools-testimonials-img">
                                <img src="assets/img/testi-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="tools-testimonials-info">
                                <h5>aditi roy</h5>
                                <span>Tempor ipsum donec id elit.</span>
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                                    adipisci, voluptate blanditiis iste nisi ipsa ipsum facilis veniam molestias,
                                    maxime, deserunt numquam impedit pariatur. A delectus debitis cumque aliquam at
                                    itaque nostrum, ratione hic deleniti.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tools-testimonials-content">
                            <div class="tools-testimonials-img">
                                <img src="assets/img/testi-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="tools-testimonials-info">
                                <h5>aditi roy</h5>
                                <span>Tempor ipsum donec id elit.</span>
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                                    adipisci, voluptate blanditiis iste nisi ipsa ipsum facilis veniam molestias,
                                    maxime, deserunt numquam impedit pariatur. A delectus debitis cumque aliquam at
                                    itaque nostrum, ratione hic deleniti.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@extends('site.layouts.app2')
@section('title', 'Tools')
@section('section')

<section class="tools_banner">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <img src="{{ asset($tool->image) }}" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2/tools') !!}">Tools</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$tool->title}}</li>
                    </ol>
                </nav>
                <h1>{{$tool->title}}</h1>
                <h5>{{$tool->description}}</h5>
                <h5><strong>Key Features</strong></h5>
                <ul>
                    <li>Collaboration Tools</li>
                    <li>Commenting/Notes</li>
                    <li>Data Import/Export</li>
                    <li>Design Management</li>
                    <li>Design Templates</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="tools_content_block">
    <div class="container">
        <p>{{$tool->meta_description}}</p>
    </div>
</section>


<section class="benefit_section">
    <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
            <h2>Benefits for Using <span>Surfer SEO</span></h2>
            <p>Find answers to commonly asked questions about product name.<br/>If your question isn't here, reach out to us at support email</p>
        </div>

        <div class="row g-5 text-center">
            @forelse($benefits as $item)
            <div class="col-sm-4">
                <h4>{{$item->title}}</h4>
                <p>{{$item->description}}</p>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</section>


<section class="usecase_Section">
    <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
            <h2>Use <span>Cases</span></h2>
            <p>Find answers to commonly asked questions about [product name].<br/>If your question isn't here, reach out to us at [support email]</p>
        </div>

        <ul class="usecase_list">
            @forelse($usecase as $item)
            <li>
                <h2><a href="{{ $item->url }}" target="_blank">{{$item->title}}</a></h2>
                <p>{{$item->description}}</p>
            </li>
            @empty

            @endforelse
        </ul>
    </div>
</section>

<section class="howtouse_section">
    <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
            <h2>How to <span>use</span></h2>
            <p>Find answers to commonly asked questions about [product name].<br/>If your question isn't here, reach out to us at [support email]</p>
        </div>

        <div class="row gx-5 text-center">
            @forelse($howtouse as $item)
            <div class="col-sm-3">
                <figure>
                    <img src="{{ asset($item->icon) }}">
                </figure>
                <h4>{{$item->title}}</h4>
                <p>{{$item->description}}</p>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</section>

<section class="pricing_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="title_area text-center">
                    <h2>Get Started Today, Pick a <span>Plan Later</span></h2>
                    <p>Try free for 7 days and get unrestricted access to all our products & features.</p>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @forelse($plans as $plan)
            <div class="col-sm-auto">
                <div class="pricing_table featured">
                    <div class="pricing">
                        <sup>£</sup>
                        {{$plan->amount}}
                        <span class="duration">/ Per Month</span>
                    </div>
                    <h5>{{$plan->title}}</h5>
                    <p>{{$plan->short_description}}</p>
                    <hr>
                    {{$plan->long_description}}
                    <!-- <ul>
                        <li>All links</li>
                        <li>Aliquam facilisis neque in lorem</li>
                        <li>Vivamus at sem sit amet ante</li>
                        <li>Donec vulputate sapien ac cursus</li>
                        <li>Curabitur vel nulla vehicula</li>
                        <li>Proin bibendum justo ac mattis</li>
                    </ul> -->
                    <div class="d-block">
                        <a href="{{ $plan->link }}" target="_blank" class="theme_btn white w-100 text-center">Start Today</a>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
            
        </div>
    </div>
</section>


<section class="benefit_section">
    <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
            <h2>Integration <span>Compatibility</span></h2>
            <p>Find answers to commonly asked questions about [product name].<br/>If your question isn't here, reach out to us at [support email]</p>
        </div>

        <div class="row g-5 text-center">
            @forelse($integration_compatibilities as $item)
            <div class="col-sm-4">
                <h4>{{$item->title}}</h4>
                <p>{{$item->description}}</p>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</section>


<section class="pros_cons_section">
    <div class="container">
        <div class="title_area text-center mb-3 mb-sm-5">
            <h2>Pros and <span>Cons</span></h2>
            <p>Find answers to commonly asked questions about [product name].<br/>If your question isn't here, reach out to us at [support email]</p>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="pros_box">
                    <h3>Pros</h3>
                    <!-- <ul>
                        <li>Endless capabilities</li>
                        <li>Figma can be used to create app prototypes and mockups for the product team</li>
                        <li>Lightweight</li>
                        <li>Lots of widgets that you can use to run memorable workshops</li>
                        <li>Support for a collaborative design environment</li>
                    </ul> -->
                    {{$tool->pros}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="cons_box">
                    <h3>Cons</h3>
                    <!-- <ul>
                        <li>Endless capabilities</li>
                        <li>Figma can be used to create app prototypes and mockups for the product team</li>
                        <li>Lightweight</li>
                        <li>Lots of widgets that you can use to run memorable workshops</li>
                        <li>Support for a collaborative design environment</li>
                    </ul> -->
                    {{$tool->cons}}
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
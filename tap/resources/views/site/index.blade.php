@extends('site.layouts.app')
@section('title', 'Homepage')
@section('section')
<section class="home_banner">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-sm-7">
        <h1>The Author’s Pad is here to make your writing ambitions a reality.</h1>
        <!-- <h3>Writers Work is the all-in-one platform for launching your dream job.</h3> -->
        <a href="#" class="theme_btn">Start Your Journey</a>

        <figure>
          <img src="{{ asset('site/images/banner_image.png')}}">
          <a href="#" class="play_btn"><img src="{{ asset('site/images/playbtn.png')}}"></a>
        </figure>
      </div>
    </div>
  </div>
</section>

<section class="feature_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-7">
        <h2>Every feature you need, all in a single system</h2>
      </div>
    </div>

    <div class="row g-3 g-sm-5">
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature1.svg')}}">
          </figure>
          <figcaption>
            <h5>Client Management</h5>
            <p>Segment, update, manage, and invoice your clients in a few clicks.</p>
            <a href="{!! URL::to('client') !!}" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature2.svg')}}">
          </figure>
          <figcaption>
            <h5>Freelancers Marketplace</h5>
            <p>Offer your writing services to publishers and businesses.</p>
            <a href="{!! URL::to('v2/marketplace') !!}" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature3.svg')}}">
          </figure>
          <figcaption>
            <h5>Guest Blogging</h5>
            <p>Offer guest posting services to businesses. Generate interest in your skills.</p>
            <a href="#" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature4.svg')}}">
          </figure>
          <figcaption>
            <h5>Project Management</h5>
            <p>Upload, manage, and organise your workflow on your personal dashboard.</p>
            <a href="{!! URL::to('user/project') !!}" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature5.svg')}}">
          </figure>
          <figcaption>
            <h5>Title Generator</h5>
            <p>Say farewell to writer’s block with our intuitive AI title generator.</p>
            <a href="{!! URL::to('title-generator') !!}" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="feature_item">
          <figure>
            <img src="{{ asset('site/images/feature6.svg')}}">
          </figure>
          <figcaption>
            <h5>Training Programs</h5>
            <p>Learn new skills and master your craft in our comprehensive courses.</p>
            <a href="{!! URL::to('user/short_courses') !!}" class="know_more">Know more</a>
          </figure>
        </div>
      </div>
    </div>
    
    <div class="clearfix pb-100"></div>
    
    <div class="d-block text-center">
      <a href="#" class="theme_btn">Get Started Today</a>
    </div>

  </div>
</section>

<section class="video_section p-0">
  <img src="{{ asset('site/images/video_image.png')}}">

  <div class="video_block">
    <h2> Build your personal brand and elevate your career in a growing community designed with you in mind.</h2>
    <a href="#" class="play_btn"><img src="{{ asset('site/images/playbtn.png')}}"></a>
  </div>
</section>

<section class="content_section">
  <div class="container">
    <div class="row flex-sm-row-reverse align-items-center justify-content-between">
      <div class="col-sm-6 text-center text-sm-end">
        <img src="{{ asset('site/images/content1.png')}}" class="img-fluid">
      </div>
      <div class="col-sm-5">
        <div class="title_area">
          <h6>Real-time analytics</h6>
          <h2>Market your skills and start <span>earning</span></h2>
        </div>
        <p>Grow your portfolio, open new career doors, and build your personal brand.</p>
        <div class="content_area">
          <ul>
            <li>Professional portfolio builder</li>
            <li>Industry-specific job board</li>
            <li>Intuitive client management tools</li>
          </ul>
        </div>
        <a href="{!! URL::to('client') !!}" class="theme_btn">Find Out More</a>
      </div>
    </div>
  </div>
</section>

<section class="content_section pt-0">
  <div class="container">
    <div class="row flex-row-sm-reverse align-items-center justify-content-between">
      <div class="col-sm-7 text-center text-sm-start mb-2 mb-sm-0">
        <img src="{{ asset('site/images/content2.png')}}" class="img-fluid">
      </div>
      <div class="col-sm-5">
        <div class="title_area">
          <h6>Seamless workflows</h6>
          <h2>Manage all of your <span>projects</span> in one place</h2>
        </div>
        <p>Upload tasks, set priorities, check upcoming due dates, and create invoices with ease. Supercharge your productivity.</p>
        <div class="content_area">
          <ul>
            <li>All-in-one project management dashboard.</li>
            <li>Inspiring premade templates and AI tools.</li>
            <li>Collaboration and communication features.</li>
          </ul>
        </div>
        <a href="{!! URL::to('user/project') !!}" class="theme_btn">Find Out More</a>
      </div>
    </div>
  </div>
</section>

<section class="target_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="title_area text-center">
          <h2>How TAP <span>Benefits</span> You</h2>
          <p>Whether you’re a hobby writer or an experienced copywriter, a small-scale publisher, or a talent-scouting employer, The Author’s Pad has something for you. Get involved today.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <a href="{!! URL::to('v2/freelancer') !!}" class="target_block">
          <img src="{{ asset('site/images/target1.svg')}}">
          <h5>Freelancer</h5>
          <p>Market your skills, land paying clients, and boost your earnings.</p>
        </a>
      </div>
      <div class="col-sm-3">
        <a href="{!! URL::to('v2/bloggers') !!}" class="target_block">
          <img src="{{ asset('site/images/target2.svg')}}">
          <h5>Blogger</h5>
          <p>Grow your blog, hone your skills, and monetise your passion.</p>
        </a>
      </div>
      <div class="col-sm-3">
        <a href="{!! URL::to('v2/employers') !!}" class="target_block">
          <img src="{{ asset('site/images/target3.svg')}}">
          <h5>Employers</h5>
          <p>Manage your workflow and discover your next brand advocate.</p>
        </a>
      </div>
      <div class="col-sm-3">
        <a href="{!! URL::to('v2/publishers') !!}" class="target_block">
          <img src="{{ asset('site/images/target4.svg')}}">
          <h5>Publishers</h5>
          <p>Commission projects, discover content, and find talented creators.</p>
        </a>
      </div>

    </div>
  </div>
</section>

<section class="content_section">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-sm-5">
        <div class="title_area">
          <h6>Real-time analytics</h6>
          <h2>Become a <span>master</span> of your craft</h2>
        </div>
        <p>Hone your skills, get inspired, and progress your career with courses, guides, and insights.</p>
        <div class="content_area">
          <ul>
            <li>Professional training programs</li>
            <li>Short courses and podcasts</li>
            <li>Blogs and daily tips</li>
          </ul>
        </div>
        <a href="{!! URL::to('user/short_courses') !!}" class="theme_btn">Find Out More</a>
      </div>
      <div class="col-sm-6 text-center text-sm-end">
        <img src="{{ asset('site/images/course_media.png')}}" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<section class="content_section pt-0">
  <div class="container">
    <div class="row flex-row-sm-reverse align-items-center justify-content-between">
      <div class="col-sm-7 text-center text-sm-start">
        <img src="{{ asset('site/images/event_media.png')}}" class="img-fluid">
      </div>
      <div class="col-sm-5">
        <div class="title_area">
          <h6>Seamless workflows</h6>
          <h2>Spread the word about your <span>skills</span></h2>
        </div>
        <p>Network with industry professionals, sell content to publishers and contact businesses directly. Get your talent noticed.</p>
        <div class="content_area">
          <ul>
            <li>Content marketplace</li>
            <li>Global copywriting events</li>
            <li>Seminars and discussions</li>
          </ul>
        </div>
        <a href="{!! URL::to('user/event') !!}" class="theme_btn">Find Out More</a>
      </div>
    </div>
  </div>
</section>

<section class="blog_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-9">
        <div class="title_area text-center">
          <h2>Get the <span>latest articles</span> from our journal, writing, discuss and share</h2>
        </div>
      </div>
    </div>

    <!--<div class="row">-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog1.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">How to Use the 8-Step Writing Process</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>This is a walk through with the eight stages of the writing process and how to separate them from each other for optimal results.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog2.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">Top 16 Copywriting Trends for 2023</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>Being ahead of the game when it comes to copywriting will give you an edge over the competition.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog3.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">How to Find Copywriting Clients on Instagram</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>Depending on who you listen to, your Instagram account is either the holy grail for client generation or a complete time suck.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog1.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">How to Use the 8-Step Writing Process</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>This is a walk through with the eight stages of the writing process and how to separate them from each other for optimal results.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog2.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">Top 16 Copywriting Trends for 2023</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>Being ahead of the game when it comes to copywriting will give you an edge over the competition.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-sm-4">-->
    <!--    <div class="blog_area">-->
    <!--      <figure>-->
    <!--        <img src="{{ asset('site/images/blog3.png')}}">-->
    <!--        <div class="meta_cat"><a href="#">Copywriting</a></div>-->
    <!--      </figure>-->
    <!--      <figcaption>-->
    <!--        <h4><a href="#">How to Find Copywriting Clients on Instagram</a></h4>-->
    <!--        <div class="blog_meta">-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/avatar.png')}}" class="avatar_img"> By <a href="#">James Brawson</a></div>-->
    <!--          <div class="meta_item"><img src="{{ asset('site/images/calendar.svg')}}"> 13 Jan 2023</div>-->
    <!--        </div>-->
    <!--        <p>Depending on who you listen to, your Instagram account is either the holy grail for client generation or a complete time suck.</p>-->
    <!--        <div class="d-block text-end"><a href="#" class="learn_btn">Learn More</a></div>-->
    <!--      </figcaption>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--</div>-->
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

    <div class="clearfix pb-100"></div>
    
    <div class="d-block text-center">
      <a href="{!! URL::to('v2/blog') !!}" class="theme_btn">See More Articles</a>
    </div>
  </div>
</section>

<section class="pricing_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-5">
        <div class="title_area text-center">
          <h6>Plans & Pricing</h6>
          <h2>Start Your Journey Today.</h2>
          <p>Try The Author’s Pad for free, or start your subscription to unlock the full capabilities of our all-in-one platform.</p>
          <!--<ul class="pricing_tab">-->
          <!--  <a href="#">$(USD)</a>-->
          <!--  <a href="#" class="active">£(GBP)</a>-->
          <!--  <a href="#">€(EUR)</a>-->
          <!--  <a href="#">AU$(AUD)</a>-->
          <!--</ul>-->
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-sm-auto">
        <div class="pricing_table featured">
          <div class="pricing">
            <sup>$</sup>
            0
            <span class="duration">/ Per Month</span>
          </div>
          <h5>Free</h5>
          <p>Perfect plan for Starters</p>
          <hr>
          <ul>
            <li>All links</li>
            <li>Aliquam facilisis neque in lorem</li>
            <li>Vivamus at sem sit amet ante</li>
            <li>Donec vulputate sapien ac cursus</li>
            <li>Curabitur vel nulla vehicula</li>
            <li>Proin bibendum justo ac mattis</li>
          </ul>
          <div class="d-block">
            <a href="{{route('front.index')}}/pricing" class="theme_btn white w-100 text-center">Start Today</a>
          </div>
        </div>
      </div>
      <div class="col-sm-auto">
        <div class="pricing_table">
          <div class="pricing">
            <sup>$</sup>
            21
            <span class="duration">/ Per Month</span>
          </div>
          <h5>Premium</h5>
          <p>Power-up your business.</p>
          <hr>
          <ul>
            <li>All links</li>
            <li>Aliquam facilisis neque in lorem</li>
            <li>Vivamus at sem sit amet ante</li>
            <li>Donec vulputate sapien ac cursus</li>
            <li>Curabitur vel nulla vehicula</li>
            <li>Proin bibendum justo ac mattis</li>
          </ul>
          <div class="d-block">
            <a href="{{route('front.index')}}/pricing" class="theme_btn black w-100 text-center">Start Today</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cat_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-5 text-center">
        <div class="title_area">
          <h5 class="text-white">Launch with ease</h5>
          <h2 class="text-white">Ready to get started? Join <span>the Community</span></h2>
          <p>Sell your skills. Hone your craft. Make your personal brand unmissable. Write your story today.</p>
          <div class="d-block">
            <a href="{!! URL::to('v2/pricing') !!}" class="theme_btn">Get Started Today</a>
            <a href="{!! URL::to('v2/contact') !!}" class="theme_btn white">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
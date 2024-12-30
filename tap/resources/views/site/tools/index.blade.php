@extends('site.layouts.app2')
@section('title', 'Tools')
@section('section')
<section class="tools_banner p-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tools</li>
                    </ol>
                </nav>
                <div class="tools_tag">
                    <img src="{{ asset('site/images/gear.svg') }}">
                    <span>Tools</span>
                </div>
                <h2>Beginner copywriting tool-kit essentials</h2>
                <p>Successful copywriters know which tools they need to push their writing to the next level. For beginners, getting to grips with these tools will massively improve your copywriting.</p>
                <p>We have tools to help any writer at any stage in their copywriting career. If you want to improve your personal productivity, we can help. This suite of tools has everything a copywriter needs to further their progression. You can learn the benefits of SEO and keyword-oriented writing, evolve your editing techniques, and manage yourself better than ever before.</p>
            </div>
            <div class="col-sm-5">
                <img src="{{ asset('site/images/tools.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="discloser_section">
    <div class="container">
        <div class="discloser_block">
            <h5>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 5L6 9H2V15H6L11 19V5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.0691 4.92999C20.9438 6.80527 21.9969 9.34835 21.9969 12C21.9969 14.6516 20.9438 17.1947 19.0691 19.07M15.5391 8.45999C16.4764 9.39763 17.003 10.6692 17.003 11.995C17.003 13.3208 16.4764 14.5924 15.5391 15.53" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                        
                <span>IMPORTANT DISCLOSURE</span>
            </h5>
            <p>The Author’s Pad may receive money from third parties through affiliate links on this page. This does not add any cost to you as a user.</p>
        </div>
        <div class="title_area">
            <h2 class="text-center">Our most <span>recommended tools</span></h2>
        </div>

        <div class="d-block">
          @forelse($recommended as $item)
            <div class="tools_block">
                <figure>
                    <img src="{{ asset($item->image) }}">
                </figure>
                <figcaption>
                    <h4>{{$item->title}}</h4>
                    <p>{{$item->description}}</p>
                    <p>{{$item->link}}</p>
                    <a href="{{ url('v2/tools', $item->slug) }}" target="_blank" class="try_btn">Try {{$item->title}} <img src="{{ asset('site/images/arrow-up-right.svg') }}"></a>
                </figcaption>
            </div>
          @empty

          @endforelse
        </div>
    </div>
</section>

<section class="tools_cat">
    <div class="container">
        <div class="title_area text-center">
            <h2>Browse our other tools by <span>category</span></h2>
        </div>

        <div class="row mt-3 mt-sm-5">
          @forelse($subcategories as $subcategory)
            <div class="col-sm-4">
                <a href="#" class="tools_cat_item">
                    <img src="{{ asset('site/images/frame.png') }}">
                    <span>{{$subcategory->title}}</span>
                </a>
            </div>
          @empty
          
          @endforelse
        </div>
    </div>
</section>

@forelse($subcategories as $item)
<section class="tools_section">
    <div class="container">
        <div class="title_area text-center">
            <h2 class="m-0">{{$item->title}}</h2>
        </div>
        <div class="row">
            @forelse($item->latestThreeTools as $tool)
            <div class="col-sm-4">
                <div class="blog_area">
                  <figure>
                    <a href="{{ url('v2/tools', $tool->slug) }}">
                      <img src="{{ asset($tool->image) }}">
                    </a>
                  </figure>
                  <figcaption>
                    <h4><a href="{{ url('v2/tools', $tool->slug) }}">{{$tool->title}}</a></h4>
                    <p>{{$tool->link}}</p>
                    <p>                      
                        {{ strlen($tool->description) > 75 ? substr($tool->description,0,75)."..." : $tool->description }}                      
                    </p>
                    <div class="d-block text-end"><a href="{{ url('v2/tools', $tool->slug) }}" class="learn_btn">Try {{$tool->title}}</a></div>
                  </figcaption>
                </div>
            </div>  
            @empty
            
            @endforelse
        </div>
    </div>
</section>
@empty

@endforelse


   
<section>
  <div class="container">
  <div class="calltoaction_section mt-2 mt-sm-5">
      <div class="row justify-content-center">
          <div class="col-sm-8">
              <div class="title_area">
                  <h2>Sign up for our newsletter</h2>
                  <p>Keep up with the latest financial tips and updates from NOW Finance</p>
                  <a href="#" class="theme_btn white large">Start Today</a>
              </div>
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
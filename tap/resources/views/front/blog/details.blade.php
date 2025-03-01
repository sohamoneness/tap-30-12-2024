@extends('front.layouts.app')
@section('title',$blog->title)
@section('section')
    <style>
        .a2a_svg svg {
            margin-right: 0!important;
        }
        
    </style>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    

    <section class="artiledetails_banner">
        
        <div class="container">
        <div class="breadcrumb-wrapper">
        <ul class="breadcumb_list mb-2 mb-sm-4">
                            <li><a href="{!! URL::to('') !!}">Home</a></li>
                            <li>/</li>
                            <li><a href="{!! URL::to('/blog') !!}">Blogs</a></li>
                            <li>/</li>
                            <li>
                                {{implode(' & ',CategoryNames($blog->article_category_id))}}
                            </li>
                            <li>/</li>
                            <li>{{ $blog->title }}</li>
                        </ul>
        </div>
            <div class="artiledetails_banner_img">
                @if($blog->image)
                    <img class="w-100" src="{{ asset($blog->image) }}" alt="">
                @else
                <img class="w-100" src="{{URL::to('/').'/Blogs/'}}{{placeholder-image.png}}">
                @endif
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="artiledetails_banner_text">
                        <!-- <ul class="breadcumb_list mb-2 mb-sm-4">
                            <li><a href="{!! URL::to('') !!}">Home</a></li>
                            <li>/</li>
                            <li><a href="{!! URL::to('/blog') !!}">Blogs</a></li>
                            <li>/</li>
                            <li>
                                {{implode(' & ',CategoryNames($blog->article_category_id))}}
                            </li>
                            <li>/</li>
                            <li>{{ $blog->title }}</li>
                        </ul> -->
                        {{-- <div class="article_badge_wrap">
                            <span class="badge">{{$blog->suburb? $blog->suburb->name : ''}}</span>

                            <span class="badge">{{ $blog->subcategory? $blog->subcategory->title : ''}}</span>
                            @if($blog->blog_tertiary_category_id == 10)

                            @else
                                <span class="badge">{{$blog->subcategorylevel? $blog->subcategorylevel->title : ''}}</span>
                            @endif
                        </div> --}}
                        <h1>{{ $blog->title }}</h1>
                        <div class="row">
                            <div class="col">
                                <ul class="articlecat">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        {{ $blog->created_at->format('d M Y') }}
                                    </li>

                                    @if($blog->tag!='')
                                        <li>
                                            @foreach(explode(',' , $blog->tag) as $catVal) 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>{{$catVal}}
                                            @endforeach
                                        </li>
                                    @endif
                                    <li>
                                        <div class="share-btns">
                                            <div class="dropdown">
                                                <button class="share_button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#898989" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <div class="w-100 pl-2">
                                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                            <a class="a2a_button_facebook"></a>
                                                            <a class="a2a_button_twitter"></a>
                                                            <a class="a2a_button_whatsapp"></a>
                                                            <a class="a2a_button_pinterest"></a>
                                                            <a class="a2a_button_linkedin"></a>
                                                            <a class="a2a_button_telegram"></a>
                                                            <a class="a2a_button_reddit"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2 py-sm-4 art-dtls">
        <div class="container">
             <div class="blog-content mt-3">
                    	<div class="row g-4">
                            <div class="col-12 col-md-4 menu-left">
                                <div class="theiaStickySidebar">
                                    <div class="blog-content-left">
                                        <ul class="list-unstyled p-0 m-0">
                                            @foreach ($content as $key => $data)
                                            <li><a href="#step{{ $data->id }}" class="menu-list" data-scroll="step{{$data->id}}"><iconify-icon icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon> {{$data->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-8 blog-content-right">
                                <div class="blog-content-el">
                                    @foreach ($content as $key => $data)
                                    @if($data->type==1)
                                    <div class="blog-detail-section" id="step{{$data->id}}">
                                        <p>{!! $data->content ?? '' !!}</p>
                                         
                                    </div>
                                    @else
                                    <!--<h1>{!! $data->content ?? '' !!}</h1>-->
                                    <div class="blog-widget">
                                    	<h1>{!! $data->content ?? '' !!}</h1>
                                    	
                                    </div>
                                     @endif
                                    @endforeach
                                </div>
                            </div>
                    	</div>
                    </div>
        </div>
    </section>
    <section class="py-2 py-sm-4 py-lg-5 bg-light">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <div class="page-title best_deal">
                        <h2>Relevent Articles</h2>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="articleSliderBtn">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="swiper Bestdeals Bestdeals2">
                    <div class="swiper-wrapper">
                        @foreach($latestblogs as  $key => $blog)
                        <div class="swiper-slide jQueryEqualHeight">
                            <div class="card blogCart border-0">
                                <div class="bst_dimg">
                                     @if($blog->image)
                                        <img src="{{ asset($blog->image) }}" class="card-img-top" alt="ltItem">
                                     @else
                                        <img class="w-100" src="{{URL::to('/').'/Demo/'}}{{placeholder-image.png}}" class="card-img-top" style="height: 350px;object-fit: cover;">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="card-body-top">
                                        <h5 class="card-title m-0"><a href="{!! URL::to('article/'.$blog->slug) !!}" class="location_btn">{{ $blog->title }}</a></h5>
                                        <div class="article_badge_wrap d-flex my-1">
                                            @foreach(CategoryNames($blog->article_category_id) as $item)
                                                <span class="subHead_badge mx-1">{{$item}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-body-bottom">
                                        <span class="tag_text">{{ $blog->tag }}</span>
                                        <!--<a href="{!! URL::to('blog-details/'.$blog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $blog->title))) !!}" class="location_btn">Read More <img src="{{asset('site/images/right-arrow.png')}}"></a>-->
                                        <a href="{!! URL::to('blog/'. $blog->slug) !!}" class="readMoreBtn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script>

    <script>
     /// alert('dd')
      $(function () {
        $(".menu-left").theiaStickySidebar({
          sidebarBehavior: "modern",
          additionalMarginTop: 140,
          additionalMarginBottom: -500,
        });
      });
    </script>

    <script>
        const menuLists = document.querySelectorAll('.menu-list')
//const menuRightEls = document.querySelectorAll('.menu-box-right-el')

menuLists.forEach(menuList => {
  menuList.addEventListener('click', (e) => {
    //console.log('dd')
    menuList.classList.add('active')

    menuLists.forEach(item2 => {
      if (item2 != menuList) {
        item2.classList.remove('active')
      }
    })

    // menuRightEls.forEach(menuRightEl => {
    //   menuRightEl.classList.add('mt')
    // })
  })
})

const dots = document.querySelectorAll(".menu-list");
const sections = document.querySelectorAll(".blog-detail-section");
window.addEventListener("scroll", scrollFunc);

function scrollFunc() {
  for (section of sections) {
    const id = section.getAttribute("id");
    const height = section.offsetHeight;
    const offset = section.offsetTop - 200;

    if (scrollY >= offset && scrollY < offset + height) {
      for (dot of dots) {
        dot.classList.remove("active");
        const dotAttr = dot.getAttribute("data-scroll");

        if (dotAttr === id) {
          dot.classList.add("active");
        }
      }
    }
 //   console.log(offset);
  }
}
    </script>

    <script>
        var swiper = new Swiper(".Bestdeals", {
  slidesPerView: 3,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  speed: 2000,
  breakpoints: {
    // when window width is >= 320px
    100: {
      slidesPerView: 1,

    },
    320: {
      slidesPerView: 1,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    }
  },
});
    </script>
@endsection

@push('scripts')
   
    
@endpush


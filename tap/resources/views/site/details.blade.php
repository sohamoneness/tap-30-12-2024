@extends('site.layouts.app2')
@section('title', 'Homepage')
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
    <section class="page_header blog">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-start">
                    <li class="breadcrumb-item"><a href="{!! URL::to('') !!}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{!! URL::to('/blog') !!}">Blogs</a></li>
                    <li class="breadcrumb-item active">
                        {{implode(' & ',CategoryNames($blog->article_category_id))}}
                    </li>
                    <li class="breadcrumb-item active">{{ $blog->title }}</li>
                </ol>
            </nav>
        </div>
    </section>
    
    <section class="blog_container pt-0">
        <div class="container">
            <div class="article_banner_image">
                @if($blog->image)
                    <img class="article_image" src="{{ asset($blog->image) }}" alt="">
                @else
                    <img class="article_image" src="{{URL::to('/').'/Blogs/'}}{{placeholder-image.png}}">
                @endif
            </div>
            <h1>{{ $blog->title }}</h1>
            
            <div class="blog_meta">
                <div class="blog_items">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    {{ $blog->created_at->format('d M Y') }}
                </div>
                @if($blog->tag!='')
                @foreach(explode(',' , $blog->tag) as $catVal) 
                    <div class="blog_items">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>{{$catVal}}
                        
                    </div>
                    @endforeach
                @endif
            </div>
            
            <div class="blog_wrapper">
                <div class="row g-5">
                    <div class="col-sm-4">
                        <div class="sticky_sidebar">
                            <div id="scrollBarContainer">
                                <div id="scrollProgressBar"></div>
                            </div>
                            
                            <ul class="table_content">
                                @foreach ($content as $key => $data)
                                <li>
                                    <a href="#step{{ $data->id }}" class="menu-list" data-scroll="step{{$data->id}}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13 17L18 12L13 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 17L11 12L6 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
 {{$data->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            
                            
                            <div class="news_letter_box">
                                <h5>Want more blogs?</h5>
                                <p>Get free insider tips from professional mountain athletes.</p>
                                <form>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" placeholder="me@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Submit">
                                    </div>
                                </form>
                                <p class="text-center">No spam. We never share your data.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div id="blog_content">
                            @foreach ($content as $key => $data)
                            @if($data->type==1)
                            <div class="blog-detail-section" id="step{{$data->id}}">
                                <p>{!! $data->content ?? '' !!}</p>
                                 
                            </div>
                            @else
                            <!--<h1>{!! $data->content ?? '' !!}</h1>-->
                            <div class="blog-widget">
                            	{!! $data->content ?? '' !!}
                            </div>
                             @endif
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


        
    <section class="related_section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <div class="page-title best_deal">
                        <h2>Relevent Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="swiper Bestdeals Bestdeals2">
                    <div class="swiper-wrapper">
                        @foreach($latestblogs as  $key => $blog)
                        <div class="swiper-slide jQueryEqualHeight">
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
                    <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cat_section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-5 text-center">
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
  spaceBetween: 30,
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
    <script>
        // When the user scrolls the page, execute myFunction 
        window.onscroll = function() {myFunction()};
        
        function myFunction() {
          var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
          var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
          var scrolled = (winScroll / height) * 100;
          document.getElementById("scrollProgressBar").style.width = scrolled + "%";
        }
</script>
@endsection
@extends('site.layouts.app2')
@section('title', 'Pricing')
@section('section')

<style>
    .pricing-pay {
        margin-bottom: 20px;
    }
</style>


<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>Pricing</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing_section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="title_area text-center">
                <h2>{!!$plan_page->header_top!!}</h2>
                    <p>{!!$plan_page->header_bottom!!}</p>
                    <div class="pricing-pay">
                        <small>I want to pay every month
                            in
                        </small>
                        <form class="select" action="">
                            <select id="currency_select" name="currency">
                                @foreach ($currencies as $item)
                                    <option value="{{$item->slug}}" {{request()->input('currency') == $item->slug ? 'selected' : ''}}>{{$item->currency_symbol}}({{$item->currency}})</option>    
                                @endforeach
                            </select>
                        </form>
                    </div>
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
        @forelse ($plans_with_price as $item)
            <div class="col-sm-auto">
              <div class="pricing_table featured">
                <div class="pricing">
                  <sup>{{$item->currencyDet->currency_symbol}}</sup>
                  {{$item->price}}
                  <span class="duration">/ {{$item->price_limit}}</span>
                </div>
                <h5>{{$item->planDet->name}}</h5>
                <p>{{$item->planDet->description}}</p>
                <hr>
                <ul>
                  @foreach (explode(',',$item->planDet->benifits) as $b)
                        <li>
                           
                            {{$b}}
                        </li>
                  @endforeach
                  <!--<li>Aliquam facilisis neque in lorem</li>-->
                  <!--<li>Vivamus at sem sit amet ante</li>-->
                  <!--<li>Donec vulputate sapien ac cursus</li>-->
                  <!--<li>Curabitur vel nulla vehicula</li>-->
                  <!--<li>Proin bibendum justo ac mattis</li>-->
                </ul>
                <div class="d-block">
                    <form method="POST" action="{{route('front.cart.add')}}" class="d-flex" id="addToCartForm">@csrf
                                        <input type="hidden" name="course_id" value="{{$item->planDet->id}}">
                                        <input type="hidden" name="course_name" value="{{$item->planDet->name}}">
                                        <input type="hidden" name="course_image" value="{{$item->planDet->icon}}">
                                        <input type="hidden" name="author_name" value="None">
                                        <input type="hidden" name="course_slug" value="None">
                                        <input type="hidden" name="purchase_type" value="subscription">
                                        <input type="hidden" name="price" value="{{$item->price}}">
                                        @if(Auth::guard('web')->check())
                                            @if(CheckIfUserBoughtAnySubscription() != false)
                                                @if(CheckIfUserBoughtAnySubscription() == $item->planDet->id)
                                                    <a href="javascript:void(0)" type="submit" class="theme_btn white w-100 text-center">Already Purchased</a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="$(this).parent().submit()" type="submit" class="theme_btn white w-100 text-center">{{$item->planDet->button_text}}</a>
                                                @endif
                                            @else
                                                <a href="javascript:void(0)" onclick="$(this).parent().submit()" type="submit" class="theme_btn white w-100 text-center">{{$item->planDet->button_text}}</a>
                                            @endif
                                        @else
                                            <a href="{{route('front.user.login')}}" class="theme_btn white w-100 text-center">{{$item->planDet->button_text}}</a>
                                        @endif
                                    </form>
                  <!--<a href="#" class="theme_btn white w-100 text-center">Start Today</a>-->
                </div>
              </div>
            </div>
            @empty
            <div class="col-sm-auto">
                <h5 class="text-center my-2">Sorry no plans found!</h5>
            </div>
            @endforelse
            <!--<div class="col-sm-auto">-->
            <!--  <div class="pricing_table">-->
            <!--    <div class="pricing">-->
            <!--      <sup>$</sup>-->
            <!--      21-->
            <!--      <span class="duration">/ Per Month</span>-->
            <!--    </div>-->
            <!--    <h5>Premium</h5>-->
            <!--    <p>Power-up your business.</p>-->
            <!--    <hr>-->
            <!--    <ul>-->
            <!--      <li>All links</li>-->
            <!--      <li>Aliquam facilisis neque in lorem</li>-->
            <!--      <li>Vivamus at sem sit amet ante</li>-->
            <!--      <li>Donec vulputate sapien ac cursus</li>-->
            <!--      <li>Curabitur vel nulla vehicula</li>-->
            <!--      <li>Proin bibendum justo ac mattis</li>-->
            <!--    </ul>-->
            <!--    <div class="d-block">-->
            <!--      <a href="#" class="theme_btn black w-100 text-center">Start Today</a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </section>


      <section class="faq_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <div class="title_area text-center">
                        <h2>Frequently asked <span>questions</span></h2>
                        <p>Find answers to commonly asked questions about [product name]. If your question isn't here, reach out to us at [support email]</p>
                    </div>
                </div>
            </div>
            <div class="row faq-sec-margin-top">
            <?php /* ?><div class="col-lg-3 col-md-3 mb-4 mb-md-0">
                <div class="faq-tabs">
                    <ul class="p-0 m-0">
                        @foreach ($plan_page_faq as $key => $item)
                            <li class="faq-tab {{$key == 0 ? 'active' : ''}}" data-tab="data_tab{{$item->header_id}}">{{$item->header}}  
                                <div class="fac-tab-check">
                                    <img src="{{ asset('frontend/img/check-normal.png')}}" alt="">
                                </div>
                            </li>
                        @endforeach
                        
                    </ul>
                </div><?php */ ?>
            </div>

            <div class="row justify-content-center">
                
                    @foreach ($plan_page_faq as $key => $item)
                    @foreach (App\Models\PlansPriceFaq::where('header_id',$item->header_id)->get() as $i => $pfaq)
                    <div class="accordian_box">
                         
                        <h5> {{ $pfaq->question }}</h5>
                        <div class="accordian_content">
                            {!! $pfaq->answer ?? '' !!}
                        </div>
                        
                    </div>
                     @endforeach
                    <!--<div class="accordian_box">-->
                    <!--    <h5><span>02.</span> Which features can I use during the trial?</h5>-->
                    <!--    <div class="accordian_content">-->
                    <!--        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis unde, illo saepe ipsam dignissimos architecto quia non voluptate corrupti ut, quidem tempore, reiciendis molestias iste veritatis necessitatibus corporis est nam.-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="accordian_box">-->
                    <!--    <h5><span>03.</span> Do I need a credit card to sign up?</h5>-->
                    <!--    <div class="accordian_content">-->
                    <!--        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis unde, illo saepe ipsam dignissimos architecto quia non voluptate corrupti ut, quidem tempore, reiciendis molestias iste veritatis necessitatibus corporis est nam.-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="accordian_box">-->
                    <!--    <h5><span>04.</span> How do I import my existing emails to my inbox?</h5>-->
                    <!--    <div class="accordian_content">-->
                    <!--        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis unde, illo saepe ipsam dignissimos architecto quia non voluptate corrupti ut, quidem tempore, reiciendis molestias iste veritatis necessitatibus corporis est nam.-->
                    <!--    </div>-->
                    <!--</div>-->
                    @endforeach
                
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
@section('script')
    <script>
        $('#currency_select').on('change',function(){
            $('.select').submit();
        });
    </script>
@endsection
@extends('front.layouts.appprofile')
@section('title',$deal->title)
@section('section')
    <style>
        .a2a_svg svg {
            margin-right: 0!important;
        }
    </style>
    <div class="container-fluid artiledetails_banner">
        <div class="row">
            {{-- <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ route('front.deals.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i
                    class="fa-solid fa-chevron-left"></i> Back</a>
            </div> --}}
            <div class="col-md-7 artiledetails_banner_left">
                <!-- <section class=""> -->
                    <!-- <div class="container-fluid"> -->
                        <div class="artiledetails_banner_img" style="height: 300px">
                            @if($deal->company_logo)
                                <img class="w-100" src="{{ asset($deal->company_logo) }}" alt="">
                            @else
                            <img class="w-100" src="{{URL::to('/').'/Blogs/'}}{{'placeholder-image.png'}}">
                            @endif
                        </div>
                    <!-- </div> -->
                <!-- </section> -->
            </div>
            <div class="col-md-5 artiledetails_banner_right">
                <section class="art-dtls">
                    <div>
                        <div class="artiledetails_banner_text">
                            <h1>{{ $deal->title }}</h1>
                            <div>
                                <ul class="articlecat">
                                    <li>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M12.6667 2.66663H3.33333C2.59695 2.66663 2 3.26358 2 3.99996V13.3333C2 14.0697 2.59695 14.6666 3.33333 14.6666H12.6667C13.403 14.6666 14 14.0697 14 13.3333V3.99996C14 3.26358 13.403 2.66663 12.6667 2.66663Z" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.667 1.33337V4.00004" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.33301 1.33337V4.00004" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 6.66663H14" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ date('d M Y', strtotime($deal->expiry_date)) }}
                                        <!-- <span class="text-danger">{{Carbon\Carbon::now()->isAfter(date('Y-m-d',strtotime($deal->expiry_date)))}}</span> -->
                                    </li>
                                    <li>
                                        <!-- <i class="fa fa-tag"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.7263 8.94004L8.94634 13.72C8.82251 13.844 8.67546 13.9424 8.51359 14.0095C8.35173 14.0766 8.17823 14.1111 8.00301 14.1111C7.82779 14.1111 7.65428 14.0766 7.49242 14.0095C7.33056 13.9424 7.18351 13.844 7.05967 13.72L1.33301 8.00004V1.33337H7.99967L13.7263 7.06004C13.9747 7.30986 14.1141 7.64779 14.1141 8.00004C14.1141 8.35229 13.9747 8.69022 13.7263 8.94004Z" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4.66699 4.66663H4.67366" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ App\Models\DealCategory::find($deal->category)->title }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- <div class="mb-4 mb-lg-0 eventDesc my-1">
                            {!! $deal->company_description !!}
                        </div> -->
                        <div class="eventDesc">
                            {!! $deal->short_description !!}
                        </div>
                    </div>
                    <form method="POST" action="{{route('front.cart.add')}}" class="d-flex" id="addToCartForm">@csrf
                        <input type="hidden" name="course_id" value="{{$deal->id}}">
                        <input type="hidden" name="course_name" value="{{$deal->title}}">
                        <input type="hidden" name="course_image" value="{{$deal->company_logo}}">
                        <input type="hidden" name="author_name" value="None">
                        <input type="hidden" name="course_slug" value="{{$deal->slug}}">
                        <input type="hidden" name="purchase_type" value="deal">
                        <input type="hidden" name="price" value="{{'15'}}">
                        @if(Auth::guard('web')->check())
                            @if(!CheckIfUserBoughtTheDeal($deal->id, Auth::guard()->user()->id))
                                <a href="javascript:void(0)" onclick="$(this).parent().submit()" type="submit" class="button btn-sm">Buy it at $15</a>
                            @else
                                <a href="javascript:void(0)" type="submit" class="button btn-sm">Already Purchased</a>
                            @endif
                        @else
                            <a href="{{route('front.user.login')}}" class="button btn-sm">Login To Purchase</a>
                        @endif
                    </form>
                </section>
            </div>
        </div>
    </div>
    <div class="d-flex container-fluid artiledetails_content">
        <div class="row">
            <div class="col-lg-7 col-12 artiledetails_content_left">
                {!! $deal->description !!}
            </div> 
            <div class="col-lg-5 col-12 artiledetails_content_right">
                <div class="similar-deals">
                    <div class="card">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('frontend/img/deals1.png') }}" alt="" class="card-img">
                        </a>
                        <div class="card-body">
                            <div class="card-title">Get 40% off on all winter collection</div>
                            <a href="javascript:void(0)">Get Coupon</a>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('frontend/img/deals2.png') }}" alt="" class="card-img">
                        </a>
                        <div class="card-body">
                            <div class="card-title">Get 40% off on all winter collection</div>
                            <a href="javascript:void(0)">Get Coupon</a>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('frontend/img/deals3.png') }}" alt="" class="card-img">
                        </a>
                        <div class="card-body">
                            <div class="card-title">Get 40% off on all winter collection</div>
                            <a href="javascript:void(0)">Get Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script async src="https://static.addtoany.com/menu/page.js"></script>
@endpush

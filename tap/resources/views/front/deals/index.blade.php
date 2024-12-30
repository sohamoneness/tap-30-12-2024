@php
    CheckIfContentIsUnderSubscription(1, 'deals')
@endphp
@extends('front.layouts.appprofile')
@section('title', ' Deals')

@section('section')
    <section class="tools_wrapper">
        <!-- <div class="container">
            <div class="row blog_header">
                <div class="col-12 col-lg-7 col-md-7 pe-lg-6">
                    <h3>{!! $deal_page_content->header_left !!}</h3>
                </div>
                <div class="col-12 col-lg-5 col-md-5 ps-lg-4 ps-md-4">
                    <p>
                        {!! $deal_page_content->header_right !!}
                    </p>
                </div>
            </div>
        </div> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="top-panel deals-top-panel">
                        <h3>Deals</h3>
                        <form action="" class="search_form">
                            <!-- <div class="row"> -->
                                {{-- <div class="col-2">
                                    <select  name="code">
                                        <option value="" hidden selected>Select Category...</option>
                                        @foreach ($cat as $index => $item)
                                            <option value="{{$item->title}}" {{ (request()->input('code') == $item->title) ? 'selected' : '' }}>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <!-- <div class="col-5"> -->
                                    <div class="page-search-block" style="bottom: -83px;">
                                        <div class="filterSearchBox">
                                            <div class="row">
                                                <div
                                                    class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                                    <div class="select-floating-admin">
                                                        <select class="filter_select form-control" name="category">
                                                            <option value="" hidden selected>Select Category...</option>
                                                            @foreach ($deal_category as $index => $item)
                                                                <option value="{{ $item->slug }}"
                                                                    {{ request()->input('category') == $item->slug ? 'selected' : '' }}>
                                                                    {{ ucwords($item->title) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-5"> -->
                                    <input type="search" name="search" placeholder="Search Title..." value="{{request()->input('search')}}">
                                <!-- </div> -->
                                {{-- <div class="col-2">
                                    <input type="search" name="address" placeholder="Enter Location">
                                </div>
                                <div class="col-2">
                                    <input type="search" name="keyword" placeholder="Enter Keyword">
                                </div> --}}
                                <!-- <div class="col-2"> -->
                                    <!-- <div class="text-right"> -->
                                        <button type="submit" class="btn btn-primary">
                                            <!-- <i class="fa fa-search"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M20.4498 19.7426L16.5433 15.8366C17.7446 14.4745 18.4062 12.7201 18.4033 10.9041C18.4033 8.90055 17.6233 7.01705 16.2068 5.60055C14.7903 4.18405 12.9068 3.40405 10.9038 3.40405C8.90082 3.40405 7.01682 4.18405 5.59982 5.60005C4.18282 7.01605 3.40332 8.90005 3.40332 10.9036C3.40332 12.9071 4.18332 14.7901 5.59982 16.2066C7.01632 17.6231 8.89982 18.4036 10.9033 18.4036C12.7383 18.4036 14.4683 17.7421 15.8358 16.5431L19.7418 20.4491C19.7881 20.4956 19.8432 20.5326 19.9039 20.5579C19.9646 20.5831 20.0296 20.5961 20.0953 20.5961C20.161 20.5961 20.2261 20.5831 20.2867 20.5579C20.3474 20.5326 20.4025 20.4956 20.4488 20.4491C20.5426 20.3553 20.5952 20.2281 20.5952 20.0956C20.5952 19.963 20.5426 19.8358 20.4488 19.7421L20.4498 19.7426ZM6.30682 15.5001C5.07932 14.2721 4.40332 12.6401 4.40332 10.9041C4.40332 9.16805 5.07932 7.53555 6.30682 6.30755C7.53482 5.08005 9.16682 4.40405 10.9033 4.40405C12.6398 4.40405 14.2718 5.08005 15.4998 6.30755C16.7273 7.53555 17.4038 9.16755 17.4038 10.9041C17.4038 12.6406 16.7273 14.2721 15.4998 15.5001C14.2718 16.7276 12.6398 17.4041 10.9038 17.4041C9.16782 17.4041 7.53432 16.7276 6.30682 15.5001Z" fill="#95C800"/>
                                            </svg>
                                        </button>
                                        {{-- <a type="button" href="{{ url()->current() }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Remove filter"><i class="fa fa-times"></i>
                                        </a> --}}
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if (request()->input('category') || request()->input('search')) --}}
            <div class="container-fluid deals_list">
                {{-- <div class="row justify-content-between">
                    <div class="col">
                        <div class="page-title best_deal">
                            <h2>
                                @if (request()->input('category') || request()->input('search'))
                                    @if ($deal->count() > 0)
                                        {{ $deal->count() }} result found for
                                        {{ request()->input('category') ? 'category "' . request()->input('category') . '"' : '' }}
                                        {{ !empty(request()->input('search')) ? ' & ' . request()->input('search') : '' }}
                                    @else
                                        No Result found for
                                        {{ request()->input('category') ? 'category "' . request()->input('category') . '"' : '' }}
                                        {{ !empty(request()->input('search')) ? ' & ' . request()->input('search') : '' }}
                                    @endif
                                @endif
                            </h2>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    @foreach ($deal as $dealProductkey => $data)
                        @if(CheckIfContentIsUnderSubscription($data->id, 'deals'))
                            <div class="col-12 col-lg-6 col-md-6 mb-3 some-list-1 blog_list">
                                <div class="card">
                                    <?php //echo $data->company_website_link; die; ?>
                                    <a href="{{$data->company_website_link}}" target="_blank" class="deals_img">
                                        <img src="{{ asset($data->company_logo) }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="">
                                            <span class="subHead_badge">{{ $data->title }}</span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <h6 class="card-title">{{ $data->short_description }}</h6>
                                            </div>
                                        </div>
                                        <div class="location_btn">
                                            <a href="{{route('front.deals.detail',$data->slug)}}" class="btn button sm-btn">Get Coupon</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12 col-lg-6 col-md-6 mb-3 some-list-1 blog_list">
                                <div class="card" style="position: relative">
                                    <a href="{{$data->company_website_link}}" target="_blank">
                                        <img src="{{ asset($data->company_logo) }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="subHead_badge">{{ $data->title }}</span>
                                        </div>
                                        <div class="location_btn">
                                            <div class="d-flex align-items-baseline">
                                                <h6 class="card-title mt-3">{{ $data->short_description }}</h6>
                                            </div>
                                        </div>
                                        <div class="location_btn">
                                            <a href="{{route('front.deals.detail',$data->slug)}}" class="btn button sm-btn">Get Coupon</a>
                                        </div>
                                    </div>
                                    <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(220,220,220,0.1); backdrop-filter: blur(4px);">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        {{-- @endif --}}
        {{-- <div class="container mb-2 mb-sm-5">
            <div class="row">
                <div class="col">
                    <ul class="toolsFilter Event_toolsFilter">
                        @foreach ($deal_category as $key => $data)
                            <li>
                                <label>
                                    <input type="radio" name="blogcategory" value="category_{{ $data->id }}"
                                        {{ $key == 0 ? 'checked' : '' }}>
                                    <span>{{ ucwords($data->title) }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($deal as $dealProductkey => $data)
                    <div class="col-12 col-lg-4 col-md-6 mb-3 some-list-1 blog_list">
                        <div class="card">
                            <a href="{{ route('front.event.details', $data->slug) }}">
                                <img src="{{ asset($data->company_logo) }}" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="subHead_badge">{{ $data->title }}</span>
                                    <div class="dateBox blog_date">
                                        <span class="date">
                                            {{ date('d', strtotime($data->start_date)) }}
                                        </span>
                                        <span class="month">
                                            {{ date('M', strtotime($data->start_date)) }}
                                        </span>
                                        <span class="year">
                                            {{ date('Y', strtotime($data->start_date)) }}
                                        </span>
                                    </div>
                                    <div class="ms-2">-</div>
                                    <div class="dateBox blog_date ms-2">
                                        <span class="date">
                                            {{ date('d', strtotime($data->end_date)) }}
                                        </span>
                                        <span class="month">
                                            {{ date('M', strtotime($data->end_date)) }}
                                        </span>
                                        <span class="year">
                                            {{ date('Y', strtotime($data->end_date)) }}
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('front.event.details', $data->slug) }}" class="location_btn">
                                    <h5 class="card-title mt-3">{{ $data->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
        {{-- <div class="container text-center mt-4 mt-lg-5">
        <a href="#" class="load_more">Load more tools..</a> --}}
    <!-- </div> -->
    </section>
@endsection

{{-- @section('script')
    <script>
    </script>
@endsection --}}

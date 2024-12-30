@extends('front.layouts.appprofile')
@section('title', ' Events')

@section('section')

    <section class="tools_wrapper">
        <!-- <div class="container">
            <div class="row blog_header">
                <div class="col-12 col-lg-7 col-md-7 pe-lg-6">
                    <h3>{!! $event_page_content->header_left !!}</h3>
                </div>
                <div class="col-12 col-lg-5 col-md-5 ps-lg-4 ps-md-4">
                    <p>
                        {!! $event_page_content->header_right !!}
                    </p>
                </div>
            </div>
        </div> -->

        <div class="top-panel">
            <h3>Events</h3>
            <form action="{{ route('front.event') }}" class="search_form">
                <!-- <div class="row"> -->
                    {{-- <div class="col-2">
                        <div class="page-search-block" style="bottom: -83px;">
                            <div class="filterSearchBox">
                                <div class="row">
                                    <div
                                        class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                        <div class="select-floating-admin">
                                            <select class="filter_select form-control" name="type">
                                                <option value="" hidden selected>Content Type</option>
                                                <option value="online"
                                                    {{ request()->input('type') == 'online' ? 'selected' : '' }}>Online
                                                </option>
                                                <option value="in person"
                                                    {{ request()->input('type') == 'in person' ? 'selected' : '' }}>In
                                                    person</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- <div class="col-2"> -->
                    <input type="search" name="price" placeholder="Price" class="price-search">
                    <!-- <select name="">
                        <option value="" selected disabled>Select Projects</option>
                        <option value="">Project1</option>
                        <option value="">Project2</option>
                        <option value="">Project3</option>
                    </select>
                    <select name="">
                        <option value="" selected disabled>Select Status</option>
                        <option value="">Status1</option>
                        <option value="">Status2</option>
                        <option value="">Status3</option>
                    </select> -->
                    <select class="" name="type">
                        <option value="" selected disabled>Content Type</option>
                        <option value="online"
                            {{ request()->input('type') == 'online' ? 'selected' : '' }}>Online
                        </option>
                        <option value="in person"
                            {{ request()->input('type') == 'in person' ? 'selected' : '' }}>In
                            person</option>
                    </select>
                    <!-- </div> -->
                    <!-- <div class="col-2"> -->
                    {{-- <div class="page-search-block" style="bottom: -83px;">
                        <div class="filterSearchBox">
                            <div class="row">
                                <div
                                    class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                    <div class="select-floating-admin">
                                        <select class="filter_select form-control" name="code">
                                            <option value="" hidden selected>Event Type</option>
                                            @foreach ($cat as $index => $item)
                                                <option value="{{ $item->id }}"
                                                    {{ request()->input('code') == $item->title ? 'selected' : '' }}>
                                                    {{ ucwords($item->title) }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- </div> -->
                    <!-- <div class="col-2"> -->
                    {{-- <input type="search" name="address" placeholder="Location"> --}}
                    {{-- <div class="page-search-block" style="bottom: -83px;">
                        <div class="filterSearchBox">
                            <div class="row">
                                <div
                                    class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                    <div class="select-floating-admin">
                                        <select class="filter_select form-control" name="address"placeholder="Location" >
                                            <option value=""  hidden selected>Location</option>
                                            @foreach ($suburb as $index => $item)
                                                <option value="{{ $item->suburb }}"
                                                    {{ request()->input('address') == $item->suburb ? 'selected' : '' }}>
                                                    {{ ucwords($item->suburb) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- </div> -->
                    <!-- <div class="col-2"> -->
                    <input type="search" name="keyword" placeholder="Enter Keywords" class="keyword-search">
                    <!-- </div> -->
                    <!-- <div class="col-2"> -->
                        <button type="submit" class="btn">
                            <!-- <i class="fa fa-search"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.4498 19.7426L16.5433 15.8366C17.7446 14.4745 18.4062 12.7201 18.4033 10.9041C18.4033 8.90055 17.6233 7.01705 16.2068 5.60055C14.7903 4.18405 12.9068 3.40405 10.9038 3.40405C8.90082 3.40405 7.01682 4.18405 5.59982 5.60005C4.18282 7.01605 3.40332 8.90005 3.40332 10.9036C3.40332 12.9071 4.18332 14.7901 5.59982 16.2066C7.01632 17.6231 8.89982 18.4036 10.9033 18.4036C12.7383 18.4036 14.4683 17.7421 15.8358 16.5431L19.7418 20.4491C19.7881 20.4956 19.8432 20.5326 19.9039 20.5579C19.9646 20.5831 20.0296 20.5961 20.0953 20.5961C20.161 20.5961 20.2261 20.5831 20.2867 20.5579C20.3474 20.5326 20.4025 20.4956 20.4488 20.4491C20.5426 20.3553 20.5952 20.2281 20.5952 20.0956C20.5952 19.963 20.5426 19.8358 20.4488 19.7421L20.4498 19.7426ZM6.30682 15.5001C5.07932 14.2721 4.40332 12.6401 4.40332 10.9041C4.40332 9.16805 5.07932 7.53555 6.30682 6.30755C7.53482 5.08005 9.16682 4.40405 10.9033 4.40405C12.6398 4.40405 14.2718 5.08005 15.4998 6.30755C16.7273 7.53555 17.4038 9.16755 17.4038 10.9041C17.4038 12.6406 16.7273 14.2721 15.4998 15.5001C14.2718 16.7276 12.6398 17.4041 10.9038 17.4041C9.16782 17.4041 7.53432 16.7276 6.30682 15.5001Z" fill="#95C800"/>
                            </svg>
                        </button>
                        {{-- <a type="button" href="{{ url()->current() }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Remove filter"><i class="fa fa-times"></i>
                            </a> --}}
                    <!-- </div> -->
                <!-- </div> -->
            </form>
        </div>
        @if (request()->input('code') ||
            request()->input('type') ||
            request()->input('price') ||
            request()->input('address') ||
            request()->input('keyword'))
            <div class="container">
               
                {{-- <div class="row">
                    @foreach ($event as $eventProductkey => $data)
                        @if (CheckIfContentIsUnderSubscription($data->id, 'events'))
                            <div class="col-12 col-lg-4 col-md-6 mb-3 some-list-1">
                               
                                <div class="card">
                                    <a href="{{ route('front.event.details', $data->slug) }}">
                                        <img src="{{ asset($data->image) }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
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
                        @else
                            <div class="col-12 col-lg-4 col-md-6 mb-3 some-list-1 ">
                               
                                <div class="card" style="position: relative">
                                    <a href="{{ route('front.event.details', $data->slug) }}">
                                        <img src="{{ asset($data->image) }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
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
                                    <div
                                        style="position: absolute; width: 100%; height: 100%; background-color: rgba(220,220,220,0.1); backdrop-filter: blur(4px);">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>--}}
            </div> 
        @endif
        <div class="container mb-2 mb-sm-5" style="display:none">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <ul class="toolsFilter Event_toolsFilter">
                        @foreach ($cat as $key => $data)
                            <li>
                                <label>
                                    <form action="{{request()->fullUrl()}}" method="GET">
                                        <input class="d-none" type="checkbox" onclick="$(this).parent().submit()" name="type" value="{{ $data->slug }}" {{ (request()->input('type') == $data->slug) ? 'checked' : '' }}>
                                    </form>
                                    <span class="{{ ((request()->input('type') ?? $cat[0]->slug) == $data->slug) ? 'bg-success' : '' }}">{{  ucwords($data->title) }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul> --}}
                </div>
                <div class="col-lg-6">
                    <ul class="d-flex justify-content-end event-view-list" id="tabs-nav">
                        <li style="width: 45px; height: 45px;" onClick="changeView('grid')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </li>
                        <li style="width: 45px; height: 45px;" onClick="changeView('list')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2"stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                        </li>
                        <li style="width: 45px; height: 45px;" onClick="changeView('cal')">
                            <svg id="Line" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 64 64">
                                <title>1</title>
                                <path
                                    d="M54,11.19482H47.57129a4.00016,4.00016,0,0,0-8-.00577c.00625.00511-15.14873.00583-15.14258-.00007a4,4,0,1,0-8,.00584H10a6.00657,6.00657,0,0,0-6,6V50.80811a6.00657,6.00657,0,0,0,6,6H54a6.00657,6.00657,0,0,0,6-6V17.19482A6.00657,6.00657,0,0,0,54,11.19482Zm-44,2h6.42871a4.0015,4.0015,0,0,0,4,3.99707,1.00016,1.00016,0,0,0-.003-2,1.99917,1.99917,0,0,1-1.997-1.99708V11.189a2,2,0,0,1,4,.00293H20.95508a1.0002,1.0002,0,0,0,.00007,2H39.57129a4.00149,4.00149,0,0,0,3.99707,4,1.00016,1.00016,0,0,0-.00007-2,1.99916,1.99916,0,0,1-1.997-1.99708V11.189a2,2,0,0,1,4,.00586H44.09961a1.00018,1.00018,0,0,0,.00005,2H54a4.00428,4.00428,0,0,1,4,4v5.56836H6V17.19482A4.00428,4.00428,0,0,1,10,13.19482ZM54,54.80811H10a4.00428,4.00428,0,0,1-4-4V24.76318H58V50.80811A4.00428,4.00428,0,0,1,54,54.80811Z" />
                                <path
                                    d="M48,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,31.78564Z" />
                                <path
                                    d="M48,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,40.78564Z" />
                                <path
                                    d="M48,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,49.78564Z" />
                                <path
                                    d="M32,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,31.78564Z" />
                                <path
                                    d="M32,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,40.78564Z" />
                                <path
                                    d="M32,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,49.78564Z" />
                                <path
                                    d="M16,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,31.78564Z" />
                                <path
                                    d="M16,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,40.78564Z" />
                                <path
                                    d="M16,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,49.78564Z" />
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <div class="event_list">
            <div class="" id="op_grid_view">
                <div class="tab-content smallGapGrid" id="grid">
                    <div class="row">
                            @foreach ($event as $eventProductkey => $data)
                                @if (CheckIfContentIsUnderSubscription($data->id, 'events'))
                                    <div class="col-12 col-lg-4 col-md-6 mb-3 blog_list event{{ $data->type }}">
                                        {{-- <a href=""> --}}
                                        <div class="card">
                                            <!-- <a href="{{ route('front.event.details', $data->slug) }}"> -->
                                            <div class="event_img">
                                                @if(!empty($data->image))
                                                <img src="{{ asset($data->image) }}" class="card-img-top"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('images/demo.png') }}" class="card-img-top"
                                                alt="">
                                                @endif    
                                                
                                                <a href="javascript:void(0)" class="location_btn ms-auto"
                                                    onclick="eventBookmark({{ $data->id }})"
                                                    title="Add event to you calender">

                                                    @php
                                                        if (
                                                            auth()
                                                                ->guard('user')
                                                                ->check()
                                                        ) {
                                                            $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                ->where(
                                                                    'user_id',
                                                                    auth()
                                                                        ->guard('web')
                                                                        ->user()->id,
                                                                )
                                                                ->first();
                                                        } else {
                                                            $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                ->where(
                                                                    'user_id',
                                                                    auth()
                                                                        ->guard('web')
                                                                        ->user()->id,
                                                                )
                                                                ->first();
                                                        }

                                                        if ($collectionExistsCheck != null) {
                                                            // if found
                                                            $heartColor = '#95C800';
                                                        } else {
                                                            // if not found
                                                            $heartColor = '#fff';
                                                        }
                                                    @endphp
                                                    <!-- <svg id="saveBtn_{{ $data->id }}_grid"
                                                        fill="{{ $heartColor }}" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 30 30" width="30px" height="30px"
                                                        stroke="#000000" stroke-width="2px">
                                                        <path
                                                            d="M23,27l-8-7l-8,7V5c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2V27z" />
                                                    </svg> -->
                                                    <svg id="saveBtn_{{ $data->id }}_grid" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <path d="M15.8332 17.5L9.99984 13.3333L4.1665 17.5V4.16667C4.1665 3.72464 4.3421 3.30072 4.65466 2.98816C4.96722 2.67559 5.39114 2.5 5.83317 2.5H14.1665C14.6085 2.5 15.0325 2.67559 15.345 2.98816C15.6576 3.30072 15.8332 3.72464 15.8332 4.16667V17.5Z" stroke="{{ $heartColor }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                </a>

                                            </div>
                                            <!-- </a> -->
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
                                                    <div class="dateBox blog_date">
                                                        @if($data->start_date!='')
                                                        <span class="date">
                                                            {{ date('d', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="month">
                                                            {{ date('M', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="year">
                                                            {{ date('Y', strtotime($data->start_date)) }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @if($data->end_date!='')
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
                                                    @endif
                                                    
                                                </div>

                                                <a href="{{ route('front.event.details', $data->slug) }}"
                                                    class="location_btn">
                                                    <h5 class="card-title">{{ $data->title }}</h5>
                                                </a>

                                                {{-- <p>{!! $data->description !!}</p> --}}

                                            </div>
                                        </div>

                                        {{-- </a> --}}
                                    </div>
                                @else
                                    <div class="col-12 col-lg-4 col-md-6 mb-3 blog_list event{{ $data->type }}">
                                        {{-- <a href=""> --}}
                                        <div class="card" style="position: relative;">
                                            <a href="{{ route('front.event.details', $data->slug) }}">
                                                @if(!empty($data->image))
                                                <img src="{{ asset($data->image) }}" class="card-img-top"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('images/demo.png') }}" class="card-img-top"
                                                alt="">
                                                @endif   
                                            </a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
                                                    <div class="dateBox blog_date">
                                                        @if($data->start_date!='')
                                                        <span class="date">
                                                            {{ date('d', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="month">
                                                            {{ date('M', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="year">
                                                            {{ date('Y', strtotime($data->start_date)) }}
                                                        </span>
                                                        @endif
                                                    </div>

                                                    @if($data->end_date!='')
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
                                                    @endif
                                                    <a href="javascript:void(0)" class="location_btn ms-auto"
                                                        onclick="eventBookmark({{ $data->id }})"
                                                        title="Add event to you calender">

                                                        @php
                                                            if (
                                                                auth()
                                                                    ->guard('user')
                                                                    ->check()
                                                            ) {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            } else {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            }

                                                            if ($collectionExistsCheck != null) {
                                                                // if found
                                                                $heartColor = '#cae47f';
                                                            } else {
                                                                // if not found
                                                                $heartColor = '#fff';
                                                            }
                                                        @endphp
                                                        <svg id="saveBtn_{{ $data->id }}_grid"
                                                            fill="{{ $heartColor }}" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 30 30" width="30px" height="30px"
                                                            stroke="#000000" stroke-width="2px">
                                                            <path
                                                                d="M23,27l-8-7l-8,7V5c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2V27z" />
                                                        </svg>


                                                    </a>
                                                </div>

                                                <a href="{{ route('front.event.details', $data->slug) }}"
                                                    class="location_btn">
                                                    <h5 class="card-title">{{ $data->title }}</h5>
                                                </a>

                                                {{-- <p>{!! $data->description !!}</p> --}}

                                            </div>
                                            <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(220,220,220,0.1); backdrop-filter: blur(4px);">
                                            </div>
                                        </div>

                                        {{-- </a> --}}
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-lg-12 center-pagination">
                                {{$event->appends($_GET)->links()}}
                            </div>
                    </div>
                </div>
            </div>
            <div class="" id="op_list_view" style="display:none">
                <div class="tab-content smallGapGrid" id="list">
                    <div class="row">
                        
                            @foreach ($event as $eventProductkey => $data)
                                @if (CheckIfContentIsUnderSubscription($data->id, 'events'))
                                    <div class="col-12  mb-3 blog_list eventlist event{{ $data->type }}">
                                        {{-- <a href=""> --}}
                                        <div class="card">
                                            <a href="{{ route('front.event.details', $data->slug) }}">
                                                @if(!empty($data->image))
                                                <img src="{{ asset($data->image) }}" class="card-img-top"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('images/demo.png') }}" class="card-img-top"
                                                alt="">
                                                @endif   
                                            </a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
                                                    <div class="dateBox blog_date">
                                                        @if($data->start_date!='')
                                                        <span class="date">
                                                            {{ date('d', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="month">
                                                            {{ date('M', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="year">
                                                            {{ date('Y', strtotime($data->start_date)) }}
                                                        </span>
                                                        @endif
                                                    </div>

                                                    @if($data->end_date!='')
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

                                                    @endif
                                                    <a href="javascript:void(0)" class="location_btn ms-auto"
                                                        onclick="eventBookmark({{ $data->id }})"
                                                        title="Add event to you calender">

                                                        @php
                                                            if (
                                                                auth()
                                                                    ->guard('user')
                                                                    ->check()
                                                            ) {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            } else {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            }

                                                            if ($collectionExistsCheck != null) {
                                                                // if found
                                                                $heartColor = '#cae47f';
                                                            } else {
                                                                // if not found
                                                                $heartColor = '#fff';
                                                            }
                                                        @endphp
                                                        <svg id="saveBtn_{{ $data->id }}_list"
                                                            fill="{{ $heartColor }}" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 30 30" width="30px" height="30px"
                                                            stroke="#000000" stroke-width="2px">
                                                            <path
                                                                d="M23,27l-8-7l-8,7V5c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2V27z" />
                                                        </svg>


                                                    </a>
                                                </div>

                                                <a href="{{ route('front.event.details', $data->slug) }}"
                                                    class="location_btn">
                                                    <h5 class="card-title">{{ $data->title }}</h5>
                                                </a>
                                                <p>{!! $data->description !!}</p>

                                                <a class="button"
                                                    href="{{ route('front.event.details', $data->slug) }}">View
                                                    Details</a>

                                            </div>
                                        </div>

                                        {{-- </a> --}}
                                    </div>
                                @else
                                    <div class="col-12  mb-3 blog_list eventlist event{{ $data->type }}">
                                        {{-- <a href=""> --}}
                                        <div class="card" style="position: relative;">
                                            <a href="{{ route('front.event.details', $data->slug) }}">
                                                @if(!empty($data->image))
                                                <img src="{{ asset($data->image) }}" class="card-img-top"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('images/demo.png') }}" class="card-img-top"
                                                alt="">
                                                @endif   
                                            </a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="subHead_badge">{{ $data->eventCategory->title }}</span>
                                                    <div class="dateBox blog_date">
                                                        @if($data->start_date!='')
                                                        <span class="date">
                                                            {{ date('d', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="month">
                                                            {{ date('M', strtotime($data->start_date)) }}
                                                        </span>
                                                        <span class="year">
                                                            {{ date('Y', strtotime($data->start_date)) }}
                                                        </span>
                                                        @endif
                                                    </div>

                                                    @if($data->end_date!='')
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
                                                    @endif
                                                    <a href="javascript:void(0)" class="location_btn ms-auto"
                                                        onclick="eventBookmark({{ $data->id }})"
                                                        title="Add event to you calender">

                                                        @php
                                                            if (
                                                                auth()
                                                                    ->guard('user')
                                                                    ->check()
                                                            ) {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            } else {
                                                                $collectionExistsCheck = \App\Models\EventUser::where('event_id', $data->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        auth()
                                                                            ->guard('web')
                                                                            ->user()->id,
                                                                    )
                                                                    ->first();
                                                            }

                                                            if ($collectionExistsCheck != null) {
                                                                // if found
                                                                $heartColor = '#cae47f';
                                                            } else {
                                                                // if not found
                                                                $heartColor = '#fff';
                                                            }
                                                        @endphp
                                                        <svg id="saveBtn_{{ $data->id }}_list"
                                                            fill="{{ $heartColor }}" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 30 30" width="30px" height="30px"
                                                            stroke="#000000" stroke-width="2px">
                                                            <path
                                                                d="M23,27l-8-7l-8,7V5c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2V27z" />
                                                        </svg>


                                                    </a>
                                                </div>

                                                <a href="{{ route('front.event.details', $data->slug) }}"
                                                    class="location_btn">
                                                    <h5 class="card-title">{{ $data->title }}</h5>
                                                </a>
                                                <p>{!! $data->description !!}</p>

                                                <a class="button"
                                                    href="{{ route('front.event.details', $data->slug) }}">View
                                                    Details</a>

                                            </div>
                                            <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(220,220,220,0.1); backdrop-filter: blur(4px);">
                                            </div>
                                        </div>

                                        {{-- </a> --}}
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-lg-12 center-pagination">
                                {{$event->appends($_GET)->links()}}
                            </div>
                    </div>
                </div>
            </div>
            <div class="" id="op_cal_view" style="display:none">
                <div class="tab-content smallGapGrid" id="calender"></div>
            </div>
        </div>
        {{-- <div class="container text-center mt-4 mt-lg-5">
            <a href="#" class="load_more">Load more tools..</a>
        </div> --}}
    </section>
@endsection
@section('script')
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

    <script>
        // $(document).ready(function() {
        //     // page is now ready, initialize the calendar...
        //     $('#calender').fullCalendar({
        //         // put your options and callbacks here
        //         //locale: 'zh-cn',
        //         header: {
        //             left: 'prev,next today',
        //             center: 'title',
        //             right: 'month,basicWeek,basicDay'
        //         },
        //         defaultDate: '2018-03-12',
        //         navLinks: true, // can click day/week names to navigate views
        //         editable: true,
        //         eventLimit: true, // allow "more" link when too many events
        //         events: [
        //             {
        //             title: 'All Day Event',
        //             start: '2018-03-01'
        //             },
        //             {
        //             title: 'Long Event',
        //             start: '2018-03-07',
        //             end: '2018-03-10'
        //             },
        //             {
        //             id: 999,
        //             title: 'Repeating Event',
        //             start: '2018-03-09T16:00:00'
        //             },
        //             {
        //             id: 999,
        //             title: 'Repeating Event',
        //             start: '2018-03-16T16:00:00'
        //             },
        //             {
        //             title: 'Conference',
        //             start: '2018-03-11',
        //             end: '2018-03-13'
        //             },
        //             {
        //             title: 'Meeting',
        //             start: '2018-03-12T10:30:00',
        //             end: '2018-03-12T12:30:00'
        //             },
        //             {
        //             title: 'Lunch',
        //             start: '2018-03-12T12:00:00'
        //             },
        //             {
        //             title: 'Meeting',
        //             start: '2018-03-12T14:30:00'
        //             },
        //             {
        //             title: 'Happy Hour',
        //             start: '2018-03-12T17:30:00'
        //             },
        //             {
        //             title: 'Dinner',
        //             start: '2018-03-12T20:00:00'
        //             },
        //             {
        //             title: 'Birthday Party',
        //             start: '2018-03-13T07:00:00'
        //             },
        //             {
        //             title: 'Click for Google',
        //             url: 'http://google.com/',
        //             start: '2018-03-28'
        //             }
        //         ]
        //     })
        // });

        function changeView(id) {
            if (id == 'cal') {
                $('#op_list_view').fadeOut();
                $('#op_cal_view').fadeIn();
                $('#op_grid_view').fadeOut();
                $('#calender').fullCalendar({
                    // put your options and callbacks here
                    events: [
                        
                            @foreach ($event as $eventProductkey => $data)
                                @if (CheckIfContentIsUnderSubscription($data->id, 'events'))
                                    {
                                        title: '{{ $data->title }}',
                                        start: '{{ $data->start_date }}',
                                        end: '{{ date('Y-m-d H:i:s', strtotime($data->end_date. ' +1 day')) }}',
                                        url: '{{ URL::to('user/event/' . $data->slug) }}',
                                    },
                                @else
                                    {
                                        title: '{{ substr($data->title, 0, 5) }}...',
                                        start: '{{ $data->start_date }}',
                                        end: '{{ date('Y-m-d H:i:s', strtotime($data->end_date. ' +1 day')) }}',
                                        url: '',
                                        color: 'rgba(0,0,0,0.6)'
                                    },
                                @endif
                            @endforeach
                       

                    ]
                })
            } else if (id == 'list') {
                $('#op_cal_view').fadeOut();
                $('#op_list_view').fadeIn();
                $('#op_grid_view').fadeOut();
            } else if (id == 'grid') {
                $('#op_cal_view').fadeOut();
                $('#op_list_view').fadeOut();
                $('#op_grid_view').fadeIn();
            }
        }
    </script>
    <script>
        function eventBookmark(jobId) {
            $.ajax({
                url: '{{ route('front.event.calender') }}',
                method: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    id: jobId,
                },
                success: function(result) {
                    // alert(result);
                    if (result.type == 'add') {
                        // toastr.success(result.message);
                        toastFire("success", result.message);
                        $('#saveBtn_' + jobId + '_grid').attr('fill', '#cae47f');
                        $('#saveBtn_' + jobId + '_list').attr('fill', '#cae47f');
                    } else {
                        toastFire("warning", result.message);
                        // toastr.error(result.message);
                        $('#saveBtn_' + jobId + '_grid').attr('fill', '#fff');
                        $('#saveBtn_' + jobId + '_list').attr('fill', '#fff');
                    }
                }
            });
        }
    </script>
@endsection

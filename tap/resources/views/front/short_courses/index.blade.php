@extends('front.layouts.appprofile')
@section('title', ' Course')
@section('section')

<div class="dashboard-content">
        <div class="row">
    <section class="courses">
        <div class="container-fluid">
            <div class="row">
                @foreach ($courses as $key => $data)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="courses-content">
                            <div class="courses-img">
                                <a href="{{ route('front.short_courses.details', $data->id) }}"><img src="{{ asset('Blogs/'.$data->image) }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="courses-info">
                                <div class="rating-row">
                                    
                                    <div class="bookmark">
                                        <a href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.8337 17.5L10.0003 13.3333L4.16699 17.5V4.16667C4.16699 3.72464 4.34259 3.30072 4.65515 2.98816C4.96771 2.67559 5.39163 2.5 5.83366 2.5H14.167C14.609 2.5 15.0329 2.67559 15.3455 2.98816C15.6581 3.30072 15.8337 3.72464 15.8337 4.16667V17.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="courses-heading">
                                    <a href="{{ route('front.short_courses.details', $data->id) }}"><h4>{{ $data->title }}</h4></a>
                                    <div class="courses-lession-time">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <!-- <i class="fa-solid fa-clock"></i> -->
                                                <img src="{{ asset('frontend/img/clock.png') }}" alt="Time">
                                                {{ $data->hours_to_complete}} hours to complete
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="courses-desc">
                                    <p>{!! $data->introduction !!}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
</div>

@endsection

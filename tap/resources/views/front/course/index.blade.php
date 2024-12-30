@extends('front.layouts.appprofile')
@section('title', ' Course')
@section('section')

    <section class="project-content">
        <div class="project-content-header">
            <div class="heading row1">
                <h3>Online Courses</h3>
            </div>
            <div class="heading row2">
                <div class="pro-content-header-right w-100">
                    <form action="{{ route('front.course') }}" class="w-100">
                        <div class="courses-filter w-100">
                            <!-- <div class="row w-100"> -->
                                <!-- <div class="col-3"> -->
                                    <!-- <div class="courses-filter-content"> -->
                                    <div class="statuss ms-0">
                                        <div class="select">
                                            <!-- <label for="">Specialization - </label> -->
                                            <select class="" name="category">
                                                <option value="" selected disabled>Specialization</option>
                                                <option value="">All</option>
                                                @foreach ($cat as $index => $item)
                                                    <option value="{{$item->slug}}" {{ $item->slug == request()->input('category') ? 'selected' : '' }}>{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-3"> -->
                                    <!-- <div class="courses-filter-content"> -->
                                    <div class="statuss">
                                        <div class="select">
                                            <!-- <label for="">Language - </label> -->
                                            <select name="language" id="language" class="" value="{{ old('language') }}">
                                                <option value="" selected disabled>Language</option>
                                                <option value="">All</option>
                                                @foreach ($languages as $l)
                                                    <option value="{{ $l->name }}" {{ $l->name == request()->input('language') ? 'selected' : '' }}>{{ $l->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-3"> -->
                                    <!-- <div class="courses-filter-content"> -->
                                    <div class="statuss">
                                        <div class="select">
                                            <!-- <label for="">Course - </label> -->
                                            <select name="type" id="">
                                                <option value="" selected>Course</option>
                                                <option value="">All</option>
                                                <option value="free" {{request()->input('type') == 'free' ? 'selected' : ''}}>Free</option>
                                                <option value="paid" {{request()->input('type') == 'paid' ? 'selected' : ''}}>Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-3"> -->
                                    <div class="text-right d-flex">
                                        <button type="submit" class="btn btn-primary btn-submitt">
                                            <!-- <i class="fa fa-search"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M20.4498 19.7426L16.5433 15.8366C17.7446 14.4745 18.4062 12.7201 18.4033 10.9041C18.4033 8.90055 17.6233 7.01705 16.2068 5.60055C14.7903 4.18405 12.9068 3.40405 10.9038 3.40405C8.90082 3.40405 7.01682 4.18405 5.59982 5.60005C4.18282 7.01605 3.40332 8.90005 3.40332 10.9036C3.40332 12.9071 4.18332 14.7901 5.59982 16.2066C7.01632 17.6231 8.89982 18.4036 10.9033 18.4036C12.7383 18.4036 14.4683 17.7421 15.8358 16.5431L19.7418 20.4491C19.7881 20.4956 19.8432 20.5326 19.9039 20.5579C19.9646 20.5831 20.0296 20.5961 20.0953 20.5961C20.161 20.5961 20.2261 20.5831 20.2867 20.5579C20.3474 20.5326 20.4025 20.4956 20.4488 20.4491C20.5426 20.3553 20.5952 20.2281 20.5952 20.0956C20.5952 19.963 20.5426 19.8358 20.4488 19.7421L20.4498 19.7426ZM6.30682 15.5001C5.07932 14.2721 4.40332 12.6401 4.40332 10.9041C4.40332 9.16805 5.07932 7.53555 6.30682 6.30755C7.53482 5.08005 9.16682 4.40405 10.9033 4.40405C12.6398 4.40405 14.2718 5.08005 15.4998 6.30755C16.7273 7.53555 17.4038 9.16755 17.4038 10.9041C17.4038 12.6406 16.7273 14.2721 15.4998 15.5001C14.2718 16.7276 12.6398 17.4041 10.9038 17.4041C9.16782 17.4041 7.53432 16.7276 6.30682 15.5001Z" fill="#95C800"/>
                                            </svg>
                                        </button>
                                        {{-- <button type="button" onclick="window.location.href = '{{ url()->current() }}'" class="btn btn-primary mx-1" title="Remove filter"><i class="fa fa-times"></i></a> --}}
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

    <div class="courses p-0 mt-3">
        <div class="container-fluid p-0">
            <!-- <div class="row">
                <div class="col-12 text-center">
                    <h2>Online Courses</h2>
                </div>
            </div> -->

            <!-- <div class="row mt-4">
                <div class="col-12">
                    <form action="{{ route('front.course') }}">
                        <div class="courses-filter">
                            <div class="row w-100">
                                <div class="col-3">
                                    <div class="courses-filter-content">
                                        <label for="">Specialization - </label>
                                        <select class="" name="category">
                                            <option value="" selected>All</option>
                                            @foreach ($cat as $index => $item)
                                                <option value="{{$item->slug}}" {{ $item->slug == request()->input('category') ? 'selected' : '' }}>{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="courses-filter-content">
                                        <label for="">Language - </label>
                                        <select name="language" id="language" class="" value="{{ old('language') }}">
                                            <option value="" selected>All</option>
                                            @foreach ($languages as $l)
                                                <option value="{{ $l->name }}" {{ $l->name == request()->input('language') ? 'selected' : '' }}>{{ $l->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="courses-filter-content">
                                        <label for="">Course - </label>
                                        <select name="type" id="">
                                            <option value="" selected>All</option>
                                            <option value="free" {{request()->input('type') == 'free' ? 'selected' : ''}}>Free</option>
                                            <option value="paid" {{request()->input('type') == 'paid' ? 'selected' : ''}}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-right d-flex">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        {{-- <button type="button" onclick="window.location.href = '{{ url()->current() }}'" class="btn btn-primary mx-1" title="Remove filter"><i class="fa fa-times"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <div class="row">
                @foreach ($course as $key => $data)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="courses-content">
                            <div class="courses-img">
                                <img src="{{ asset($data->image) }}" alt="" class="img-fluid">
                            </div>
                            <div class="courses-info">
                                <!-- <div class="courses-badge">
                                    @if ($data->category)
                                        <span><img src="{{ asset($data->category->image) }}" alt="">
                                            {{ $data->category->title }}</span>
                                    @else
                                        <span>No Category</span>
                                    @endif
                                </div> -->
                                <div class="rating-row">
                                    <div class="crs-rating-all">
                                        <span>
                                            {!! RatingHtml(getReviewDetails($data->id)['average_star_count']) !!}
                                        </span>
                                        @if(getReviewDetails($data->id)['total_reviews'] > 0)
                                            <a href="javascript::void()">  {{ getReviewDetails($data->id)['total_reviews'] }} </a>
                                        @endif
                                    </div>
                                    <div class="bookmark">
                                        <a href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.8337 17.5L10.0003 13.3333L4.16699 17.5V4.16667C4.16699 3.72464 4.34259 3.30072 4.65515 2.98816C4.96771 2.67559 5.39163 2.5 5.83366 2.5H14.167C14.609 2.5 15.0329 2.67559 15.3455 2.98816C15.6581 3.30072 15.8337 3.72464 15.8337 4.16667V17.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="courses-heading">
                                    <h4>{{ $data->title }}</h4>
                                    <div class="courses-lession-time">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <!-- <i class="fas fa-language"></i> -->
                                                <img src="{{ asset('frontend/img/language.png') }}" alt="Language">
                                                {{ $data->language }}
                                            </li>
                                            <li>
                                                <!-- <i class="fa-solid fa-clock"></i> -->
                                                <img src="{{ asset('frontend/img/clock.png') }}" alt="Time">
                                                {{ countTotalHours($data->id) }}
                                            </li>
                                            @php
                                                $totalLessonsAndTopics = totalLessonsAndTopics($data->id);
                                            @endphp
                                            <li>
                                                <!-- <i class="fa-solid fa-book"></i> -->
                                                <img src="{{ asset('frontend/img/book.png') }}" alt="Lessons">
                                                {{ $totalLessonsAndTopics->lesson_count }} Lessons
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="courses-desc">
                                    <p>{!! $data->short_description !!}</p>
                                    
                                    <!-- <div class="crs-rating-all">
                                        <span>
                                            {!! RatingHtml(getReviewDetails($data->id)['average_star_count']) !!}
                                        </span>
                                        @if(getReviewDetails($data->id)['total_reviews'] > 0)
                                            <a href="javascript::void()">  {{ getReviewDetails($data->id)['total_reviews'] }} </a>
                                        @endif
                                    </div> -->
                                    <div class="price-crs">
                                        <span>{{ $data->price == 0 ? 'Free' : '$ ' . $data->price }}</span>
                                        <a href="{{ route('front.course.details', $data->slug) }}" class="course-btn">Enroll</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
    </div>
    </section>

@endsection

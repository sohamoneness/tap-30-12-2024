@extends('front.layouts.appprofile')
@section('title', 'My Courses')

@section('section')
<section class="edit-sec edit-basic-detail">
    <div class="course-content-accordions">
        <div class="row">
            @forelse ($course as $data)
                @foreach($data->orderProducts as $courseKey => $courseProduct)
                 @php
                    if($courseProduct->type!=4 && isset($courseProduct->courseName->id) && $courseProduct->courseName->id != ""){
                        //echo $courseProduct->type;
                       $lesson=App\Models\CourseLesson::where('course_id',$courseProduct->courseName->id)->get();
                    }
                     //dd($lesson);
                 @endphp
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="courses-content purchased">
                        <div class="courses-img">
                            @if(!empty($courseProduct->courseName->image))
                            <img src="{{ asset($courseProduct->courseName->image) }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="courses-info">
                            
                            <!-- <div class="courses-badge">
                                @if (!empty($courseProduct->courseName->category))
                                    @if(!empty($courseProduct->courseName->category->image))
                                        <span>
                                            <img src="{{ asset($courseProduct->courseName->category->image) }}" alt="">
                                            {{ $courseProduct->courseName->category->title }}
                                        </span>
                                    @else
                                        <span>No Category</span>
                                    @endif
                                @endif
                            </div> -->
                            <div class="rating-row">
                                <div class="crs-rating-all">
                                    <span>
                                        <span>No ratings</span>
                                    </span>
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
                                <h4>{{ $courseProduct->courseName->title ?? ''}}</h4>
                                <div class="courses-lession-time">
                                    <ul class="list-unstyled p-0 m-0">
                                        <li>
                                            <!-- <i class="fa-solid fa-list"></i> -->
                                            <img src="{{ asset('frontend/img/language.png') }}" alt="Language">
                                            {{ $courseProduct->courseName->language ?? ''}}
                                        </li>
                                        <li>
                                            <!-- <i class="fa-solid fa-clock"></i> -->
                                            <img src="{{ asset('frontend/img/clock.png') }}" alt="Time">
                                            {{ countTotalHours($courseProduct->courseName->id ??'') }}
                                        </li>
                                        @php
                                          if(isset($courseProduct->courseName->id) && $courseProduct->courseName->id != ""){
                                            $totalLessonsAndTopics = totalLessonsAndTopics($courseProduct->courseName->id);
                                          }
                                        @endphp
                                        <li>
                                            <!-- <i class="fa-solid fa-book"></i> -->
                                            <img src="{{ asset('frontend/img/book.png') }}" alt="Lessons">
                                            {{ $totalLessonsAndTopics->lesson_count ?? '' }} Lessons
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @php
                            if(isset($courseProduct->courseName) && $courseProduct->courseName != ""){
                            @endphp
                                <div class="courses-desc">
                                    <p>{!! $courseProduct->courseName->short_description ?? ''!!}</p>
                                    <div class="completed-progress">
                                        <label>
                                            Complete
                                            {{--<span>{{(int)(completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic/completedTopicPerCourse($courseProduct->courseName->id)->total_topic * 100)}}%</span>--}}
                                        </label>
                                        <div class="progress">
                                            {{--<div class="progress-bar" role="progressbar" style="width: {{(int)(completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic/completedTopicPerCourse($courseProduct->courseName->id)->total_topic * 100)}}%" aria-valuenow="{{(int)(completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic/completedTopicPerCourse($courseProduct->courseName->id)->total_topic * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                        </div>
                                    </div>
                                    <a href="{{route('front.user.courses.details',$courseProduct->courseName->slug)}}" class="course-btn">
                                        @if(completedTopicPerCourse($courseProduct->courseName->id)->total_topic == completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic)
                                            Course Comlpeted! Watch all videos again
                                        @elseif(completedTopicPerCourse($courseProduct->courseName->id)->total_topic > completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic && completedTopicPerCourse($courseProduct->courseName->id)->total_viewed_topic > 0)
                                            Continue reading...
                                        @else
                                            Start Course
                                        @endif
                                    </a>
                                </div>
                            @php
                               }
                            @endphp


                        </div>
                    </div>
                </div>
                @endforeach
            @empty
                <div class="course-content-accor">
                    <h3 class="text-center"> No Courses found! </h3>
                </div>
            @endforelse
        </div>
    </div>

</section>
@endsection
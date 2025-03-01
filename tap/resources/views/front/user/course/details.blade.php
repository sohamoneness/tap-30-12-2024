@extends('front.layouts.appprofile')
@section('title')

@section('section')

@php
    $totalLessonsAndTopics = totalLessonsAndTopics($course->id);
    //dd($totalLessonsAndTopics);
@endphp

<section class="edit-sec edit-basic-detail p-0 pt-2 bg-white for_lession_details_footer">
    <div class="crs-details lession-details">
        <div class="topic-video">
             <video width="640" height="320" controls id="contentVideo" class="contentVideo" data-id="{{getCountervideotopic($course->id)->id}}" data-topic_id="{{getCountervideotopic($course->id)->topic_id}}" style="" controlsList="{{$course->video_downloadable == 0 ? 'nodownload' : '' }}">
                <source src="{{asset(getTopicVideo(getCountervideotopic($course->id)->topic_id))}}" type="video/mp4">
            </video> 
            @if(getPrevVideoTopic(getCountervideotopic($course->id)->id) != false)
                <a href="javascript:void(0)" onclick="savetopicAndSetCounter(this)" data-id="{{getPrevVideoTopic(getCountervideotopic($course->id)->id)->id}}" class="lession_nav prev">
                    <i class="fas fa-angle-left"></i>
                </a>
            @endif
            @if(getNextVideoTopic(getCountervideotopic($course->id)->id) != false)
                <a href="javascript:void(0)" onclick="savetopicAndSetCounter(this)" data-id="{{getNextVideoTopic(getCountervideotopic($course->id)->id)->id}}" class="lession_nav next">
                    <i class="fas fa-angle-right"></i>
                </a>
            @endif
        </div>
        <div class="topic-desc" id="description_and_reviews">
            <!-- <h4>Installing Python</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p> -->
            <ul class="nav nav-tabs media-tabs" id="myTab" role="tablist">
                <li class="nav-item crsContent_showHide" role="presentation">
                    <a href="#course-content" data-toggle="tab" class="nav-link {{request()->input('page') ? 'active' : ''}}" id="course-content-tab" data-bs-toggle="tab" data-bs-target="#course-content" role="tab" aria-controls="course-content" aria-selected="false">Course Content</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#description" data-toggle="tab" class="nav-link {{request()->input('page') ? '' : 'active'}}" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#review" data-toggle="tab" class="nav-link {{request()->input('page') ? 'active' : ''}}" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" role="tab" aria-controls="review" aria-selected="true">review</a>
                </li>
            </ul>
            <div class="tab-content details-tab">
                <div class="tab-pane crsContent_showHide {{request()->input('page') ? 'active' : ''}}" id="course-content" role="tabpanel" aria-labelledby="course-content-tab">
                    <div class="lessionSidebar-header">
                        <p>
                            {{$course->title}} 
                            
                            <?php 
                            if(completedTopicPerCourse($course->id)->total_topic != 0){
                          ?>
                           ({{(int)(completedTopicPerCourse($course->id)->total_viewed_topic/completedTopicPerCourse($course->id)->total_topic * 100)}}% Completed)
                         <?php 
                            }else{
                          ?>
                                           ({{ 0 }}% Completed)
                          <?php 
                              }
                          ?>
                        </p>
                    </div>
                    <div class="accordion-container lessionSidebar-list">
                        @foreach($totalLessonsAndTopics->lessons as $key => $lesson)
                        <div class="set lesstionItem {{getCountervideotopic($course->id)->lesson_id == $lesson->lesson->id ? 'active' : ''}}">
                            <a href="javascript:void(0)">
                                {!! $lesson->lesson->title !!}  ({{completedTopicPerLesson($course->id, $lesson->lesson->id).'/'.count($totalLessonsAndTopics->topics[$key])}} Completed)
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="content">
                                <ul class="topicList">
                                    @foreach($totalLessonsAndTopics->topics[$key] as $data)
                                    <li>
                                        <a href="javascript:void(0)" onclick="loadIndividualTopic(this,'{{$lesson->lesson->id}}')" id="topic_div_id{{$data->topic->id}}" class="topic_div_id" data-id="{{$data->topic->id}}">
                                            @if(getViewedStatus($course->id,$lesson->lesson->id,$data->topic->id) != null)
                                                <input type="checkbox" class="topicCheck" onclick="return false" {{getViewedStatus($course->id,$lesson->lesson->id,$data->topic->id)->is_view == 1 ? 'checked' : ''}}>
                                            @endif
                                            <div class="stamp">
                                                <h5>{!! $data->topic->title  !!}</h5>
                                                <div class="duration">
                                                    <i class="fas fa-circle-play"></i>
                                                    <span>{{ number_format((float)$data->topic->video_length, 2, ':', '') }} hours</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane {{request()->input('page') ? '' : 'active'}}" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <p>{!! $course->description !!}</p>
                </div>
                <div class="tab-pane {{request()->input('page') ? 'active' : ''}}" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <form action="{{ route('front.user.courses.rating.store') }}" method="POST" role="form" 
                            enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="topic_id" value="{{ getCountervideotopic($course->id)->topic_id }}">
                        <div class="form-group">
                            <label class="control-label" for="rating"> Rating</label>
                            <div class="star-rating" style="text-align: left;">
                                <input id="star-5" type="radio" name="rating" value="5" />
                                <label for="star-5" title="5 stars">
                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                </label>
                                <input id="star-4" type="radio" name="rating" value="4" />
                                <label for="star-4" title="4 stars">
                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                </label>
                                <input id="star-3" type="radio" name="rating" value="3" />
                                <label for="star-3" title="3 stars">
                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                </label>
                                <input id="star-2" type="radio" name="rating" value="2" />
                                <label for="star-2" title="2 stars">
                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                </label>
                                <input id="star-1" type="radio" name="rating" value="1"/>
                                <label for="star-1" title="1 star">
                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                </label>
                            </div>
                            @error('rating')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label>Write a review on - {{getTopicDetail(getCountervideotopic($course->id)->topic_id)->title}}</label>
                            <textarea rows="6" name="review" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-left">
                            <button type="submit" class="btn add-btn-edit ms-0 my-4">Submit</button>
                        </div>
                    </form>
                    <div class="row">
                        @foreach (getAllReviewsTopicWise(getCountervideotopic($course->id)->topic_id) as $item)
                            <div class="col-lg-6">
                                <div class="crs-reviews">
                                    <div class="r_head">
                                        <div class="r_avatar">
                                            <img src="{{asset(getUserDet($item->user_id)->image)}}" alt="">
                                        </div>
                                        <div class="r_meta">
                                            <h6>{{getUserDet($item->user_id)->first_name}} {{getUserDet($item->user_id)->last_name}}</h6>
                                            <div class="singlecourseRating">
                                                <div class="rating-list-stars d-flex">{!! RatingHtml($item->rating) !!}</div>
                                                <small>{{date('d, M Y',strtotime($item->created_at))}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="r_content">
                                        <div class="text-sm">{{$item->review}}</div>
                                    </div>
                                </div>
                            </div>    
                        @endforeach
                    </div>
                    {{getAllReviewsTopicWise(getCountervideotopic($course->id)->topic_id)->links()}}
                </div>
            </div>
        </div>
    </div>
 

    <div class="lessionSidebar" style="margin-top: 102px;">
        <div class="lessionSidebar-header">
            <p>
                {{$course->title}} 
                <?php 
                  if(completedTopicPerCourse($course->id)->total_topic != 0){
                ?>
                 ({{(int)(completedTopicPerCourse($course->id)->total_viewed_topic/completedTopicPerCourse($course->id)->total_topic * 100)}}% Completed)
               <?php 
                  }else{
                ?>
                                 ({{ 0 }}% Completed)
                <?php 
                    }
                ?>

            </p>
        </div>
        <div class="accordion-container lessionSidebar-list">
            @foreach($totalLessonsAndTopics->lessons as $key => $lesson)
            <div class="set lesstionItem {{getCountervideotopic($course->id)->lesson_id == $lesson->lesson->id ? 'active' : ''}}">
                <a href="javascript:void(0)">
                    {!! $lesson->lesson->title !!}  ({{completedTopicPerLesson($course->id, $lesson->lesson->id).'/'.count($totalLessonsAndTopics->topics[$key])}} Completed)
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="content">
                    <ul class="topicList">
                        @foreach($totalLessonsAndTopics->topics[$key] as $data)
                        <li>
                            <a href="javascript:void(0)" onclick="loadIndividualTopic(this,'{{$lesson->lesson->id}}')" id="topic_div_id{{$data->topic->id}}" class="topic_div_id" data-id="{{$data->topic->id}}">
                                @if(getViewedStatus($course->id,$lesson->lesson->id,$data->topic->id) != null)
                                    <input type="checkbox" class="topicCheck" onclick="return false" {{getViewedStatus($course->id,$lesson->lesson->id,$data->topic->id)->is_view == 1 ? 'checked' : ''}}>
                                @endif
                                <div class="stamp">
                                    <h5>{!! $data->topic->title  !!}</h5>
                                    <div class="duration">
                                        <i class="fas fa-circle-play"></i>
                                        <span>{{ number_format((float)$data->topic->video_length, 2, ':', '') }} hours</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function setActiveClassForTopic() {
            for (let index = 0; index < $('.topic_div_id').length; index++) {
                if($('.topic_div_id').eq(index).data('id') == $('.contentVideo').data('topic_id')){
                    $('.topic_div_id').removeClass('active');
                    $('#topic_div_id'+$('.contentVideo').data('topic_id')).addClass('active');

                }
            }
        }
        setActiveClassForTopic();

        function savetopicAndSetCounter(x){
            // alert($(x).data('id'));
            console.log($(x).data('id'));
            const current_counter_id = $('#contentVideo').data('id');
            $.ajax({
                method: "POST",
                url: "{{route('front.user.courses.savetopicAndSetCounter')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    id: $(x).data('id'),
                    current_counter_id: current_counter_id,
                    course_id: "{{$course->id}}",
                },
                success: function(response){
                    if(response.message == "New Topic Completed!"){
                        toastFire('success', response.message);
                    }
                    location.reload();
                }
            })
        }

        function loadIndividualTopic(x,lesson_id){
            $.ajax({
                method: "POST",
                url: "{{route('front.user.courses.loadIndividualTopic')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    topic_id: $(x).data('id'),
                    lesson_id: lesson_id,
                    course_id: "{{$course->id}}",
                },
                success: function(response){
                    if(response.message == "New Topic Completed!"){
                        toastFire('success', response.message);
                    }
                    location.reload();
                }
            })
        }


        $(".lessionSidebar-close").on('click', function(){
            $('.lessionSidebar').toggleClass('active')
            setTimeout(() => {
                $('.lessionSidebar-btn').show()
            }, 300);
        })
        $(".lessionSidebar-btn").on('click', function(){
            $('.lessionSidebar').toggleClass('active')
            $(this).hide()
        })

        $(".set > a").on("click", function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).siblings(".content").slideUp(200);
            } else {
                $(".set > a").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp(200);
                $(this).siblings(".content").slideDown(200);
            }
        });


        // Make the tab stay activated while the page loads
        $(document).ready(function(){
            $('.media-tabs a[data-toggle="tab"]').on('click', function(e) {
                window.localStorage.setItem('active__tab', $(e.target).attr('href'));
            });
            let active__tab = window.localStorage.getItem('active__tab');
            if (active__tab) {
                $('.media-tabs a[href="' + active__tab + '"]').tab('show');
                window.localStorage.removeItem("active__tab");
            }
        })


    </script>
@endsection

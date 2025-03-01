@extends('front.layouts.appprofile')
@section('title',' Course')
@section('section')

<section class="course-details-section crs-before-purchase pt-0">
    <div class="course-details_header">
        <div class="container position-relative">
            <div class="course__heading_flex">
                <div class="course-details-main-info">
                    <h2>{{ $course->title ?? '' }}</h2>
                    <div id="less_text">
                        <p>{!! substr($course->short_description,0,150) ?? '' !!}</p>
                        @if(strlen($course->short_description) > 150)
                            <span style="font-size: 10px">
                                <a onclick="$('#less_text').hide(); $('#all_text').show();" href="javascript:void(0)">...See More</a>
                            </span>
                        @endif
                    </div>
                    <div class="rating-row">
                        <div class="rating-star">
                            <img src="{{ asset('frontend/img/rating.png') }}" alt="Email">
                        </div>
                        <div class="rating-numbers">215,475 rating</div>
                        <div class="student-numbers">616,029 students</div>
                    </div>
                    <div class="info-row">
                        <ul class="list-unstyled p-0 m-0 d-flex">
                            <li>
                                <img src="{{ asset('frontend/img/language.png') }}" alt="Language">
                                English
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/clock.png') }}" alt="Time">
                                9.5 hours
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/book.png') }}" alt="Lessons">
                                2 Lessons
                            </li>
                        </ul>
                    </div>
                    <div id="all_text" style="display: none;">
                        <p>{!! $course->short_description !!}</p>
                    </div>
                    @php
                        $review=App\Models\CourseReview::where('course_id',$course->id)->get();
                    @endphp
                    @if(getReviewDetails($course->id)['total_reviews'] > 0)               
                        <div class="crs-rating-all">
                            <span>
                                {!! RatingHtml(getReviewDetails($course->id)['average_star_count']) !!}
                            </span>
                            <a href="#crs_reviews">( {{ getReviewDetails($course->id)['total_reviews'] }} review)</a>
                            <small>{!! getReviewDetails($course->id)['total_person_reviewed'] !!} Students</small>
                        </div>
                    @endif
                    
                </div>
                <!-- <div class="crs-back-btn">
                    <a href="{{ route('front.course') }}" class="add-btn-edit d-inline-block">
                        <i class="fa-solid fa-chevron-left"></i> Back
                    </a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-0">
            <div class="col-12 col-lg-8 col-md-12 mb-3 mb-lg-0 course__details__bar">
                <div class="course-details-left">
                    <div class="theiaStickySidebar">
                        <div class="course-details-left-content">

                            <div class="learn">
                                <h5>What you'll learn : </h5>
                                <ul>
                                    @foreach (explode(',',$course->course_content) as $item)
                                        <li>
                                            <!-- <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span> -->
                                            <p>{{ $item }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="crs-desc">
                                <h5>Description</h5>
                                <p>
                                    {!! $course->description !!}
                                </p>
                            </div>
                            <div class="course-content">
                                <h5>Course content : </h5>
                                @php
                                    $totalLessonsAndTopics = totalLessonsAndTopics($course->id);
                                   
                                @endphp
                                <!-- <ul class="list-unstyled p-0 m-0 course-content-details">
                                    <li>{{ $totalLessonsAndTopics->lesson_count }} Lessons</li>
                                    <li>{{ $totalLessonsAndTopics->topic_count }} Topics</li>
                                    <li>{{ countTotalHours($course->id)}} total length</li>
                                </ul> -->

                                <div class="course-content-accordions">
                                    @foreach($totalLessonsAndTopics->lessons as $key => $lesson)
                                    @php
                                       $totalTopics=totalTopics($lesson->id);
                                    @endphp
                                        <div class="course-content-accor">
                                            <div class="accor-top">
                                                <div class="accor-top-left">
                                                    <span>{!! $lesson->lesson->title !!}</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                    <i class="fa-solid fa-minus"></i>
                                                </div>
                                                {{--<div class="accor-top-right">
                                                     <div class="duraton">
                                                        <span>{{ $totalLessonsAndTopics->topic_count }} Lecture</span>
                                                        <span>
                                                            <i class="fas fa-circle"></i>
                                                            {{ countTotalTopicHours($lesson->id)}} 
                                                        </span>
                                                    </div> 
                                                </div>--}}
                                            </div>
                                            <div class="accor-content">
                                                <ul class="list-unstyled p-0 m-0">
                                                @foreach($totalLessonsAndTopics->topics[$key] as $data)
                                                    @if(Auth::guard('web')->check())
                                                        @if(CheckIfUserBoughtTheCourse($course->id, Auth::guard('web')->user()->id))
                                                            <li><a href=""><div class="d-flex align-items-center left-side"><i class="fa-regular fa-circle-play"></i>{!! $data->topic->title  !!}</div><div class="d-flex align-items-center right-side">({{ number_format((float)$data->topic->video_length, 2, ':', '') }} hours) <span onclick="playVideo('{{asset($data->topic->video)}}')"><i class="fa-regular fa-eye"></i> Watch Full video</span></div></a></li>
                                                        @else
                                                            <li><a href=""><div class="d-flex align-items-center left-side"><i class="fa-regular fa-circle-play"></i>{!! $data->topic->title  !!}</div><div class="d-flex align-items-center right-side">({{ number_format((float)$data->topic->video_length, 2, ':', '') }} hours) <span onclick="playVideo('{{asset($data->topic->preview_video)}}')"><i class="fa-regular fa-eye"></i> Preview</span></div></a></li>
                                                        @endif
                                                    @else
                                                        <li><a href=""><div class="d-flex align-items-center left-side"><i class="fa-solid fa-circle-play"></i>{!! $data->topic->title  !!}</div><div class="d-flex align-items-center right-side">({{ number_format((float)$data->topic->video_length, 2, ':', '') }} hours) <span onclick="playVideo('{{asset($data->topic->preview_video)}}')"><i class="fa-regular fa-eye"></i> Preview</i></span></div></a></li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            @if(!empty($course->author_image))
                            <div class="container-fluid instructor p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>Instructor :</h5>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center w-100">
                                    <div class="col-md-3 d-flex">
                                        <img src="{{asset($course->author_image)}}" alt="" style="width:100%; height:100%; object-fit:cover; border-radius: 10px;">
                                    </div>
                                    <div class="col-md-9 d-flex flex-column justify-content-center">
                                        <h4>{{$course->author_name}}</h4>
                                        <p>{!!$course->author_description !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <div id="crs_reviews" class="crs_reviews">
                                <div class="row">
                                    @foreach (getAllReviewsCourseWise($course->id) as $item)
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
                                {{getAllReviewsCourseWise($course->id)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-md-12 courseSidebar position-relative">
                <div class="theiaStickySidebar sticky-price-bar" id="barSticky">
                    <div class="course-details-right-content">
                        <div class="course-details-video" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="course-details-video-img">
                                {{-- <video src="{{asset($course->preview_video)}}"></video> --}}
                                <img src="{{asset($course->image)}}" alt="">
                            </div>
                            <span onclick="playVideo('{{asset($course->preview_video)}}')"><i class="fa-solid fa-play"></i></span>
                            <label>Preview Course</label>
                        </div>
                        <h3 class="course-price">
                            ${{ $course->price }}
                            {{-- <span>${{ $course->price }}</span>

                            <small>36% off</small> --}}
                        </h3>


                        <div class="course-include">
                            <!-- <h5>This course includes:</h5> -->
                            <ul class="list-unstyled p-0 m-0">
                                <li>
                                    <img src="{{ asset('frontend/img/on-demand1.png') }}" alt="">
                                    {{ countTotalHours($course->id)}} on-demand video
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/img/course-file1.png') }}" alt="">
                                    {{ $totalLessonsAndTopics->lesson_count }} Lessons {{ $totalLessonsAndTopics->topic_count }} Topics
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/img/download1.png') }}" alt="">
                                    {{ $totalLessonsAndTopics->total_downloadable_contents }} downloadable resources
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/img/infinity-access1.png') }}" alt="">
                                    Full lifetime access
                                </li>
                                @if($course->certificate == 1)
                                <li>
                                    <img src="{{ asset('frontend/img/trophy.png') }}" alt="">
                                    Certificate of completion
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="course-details-right-btn">
                            <form method="POST" action="{{route('front.cart.add')}}" class="d-flex" id="addToCartForm">@csrf
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <input type="hidden" name="course_name" value="{{$course->title}}">
                                <input type="hidden" name="course_image" value="{{asset($course->image)}}">
                                <input type="hidden" name="author_name" value="{{$course->company_name}}">
                                <input type="hidden" name="course_slug" value="{{$course->slug}}">
                                <input type="hidden" name="price" value="{{$course->price}}">
                                <input type="hidden" name="purchase_type" value="course">
                                @if(Auth::guard('web')->check())
                                    @if(!CheckIfUserBoughtTheCourse($course->id, Auth::guard('web')->user()->id))
                                        <button type="submit" id="addToCart__btn" class="course-deails-btn">Add to Cart</button>
                                    @else
                                        <button type="button" class="course-deails-btn disabled">Already Purchased</button>
                                    @endif
                                @else
                                    <a href="{{route('front.user.login')}}" class="course-deails-btn">Add to Cart</a>
                                @endif
                            </form>
                            {{-- <a href="" class="course-deails-btn">Add to cart</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Modal to open video --}}
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Video</h5>
                            <p class="close btn btn-success" style="float:right" onclick="$('#videoModal').modal('hide')">&times;</p>
                        </div>
                        <div class="modal-body">
                            <video id="videoplace" autoplay muted controls width="100%" height="350" src=""></video>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Video Modal Ends --}}
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    function playVideo(videoUrl) {
        // alert(videoUrl);
        event.preventDefault();
        $('#videoModal').modal('show');
        // $('#videoplace').attr('src', window.location.origin + '/' + videoUrl);
        $('#videoplace').attr('src', videoUrl);
    }

    (function($){

    let stickyPriceBar = $("#barSticky");

    $(window).scroll(function () {
      let scroll = $(window).scrollTop();
      if (scroll >= 350) {
        $("#barSticky").addClass("scrolled");
      } else {
        $("#barSticky").removeClass("scrolled");
      }
    });

    // add to cart ajax
	$('#addToCartForm').on('submit', function(e) {
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url: $(this).attr('action'),
			method: $(this).attr('method'),
			data: data,
			beforeSend: function() {
				$('#addToCart__btn').addClass('missingVariationSelection').text('Adding to Cart');
			},
			success: function(result) {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 2000,
					// timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				})
				if (result.status == 200) {
					Toast.fire({
					  icon: 'success',
					  title: result.message
					})
					$('#cart-count').text(result.response).removeClass('d-none');
				} else {
					Toast.fire({
					  icon: 'error',
					  title: result.message
					})
				}
				$('#addToCart__btn').attr('disabled', false).removeClass('missingVariationSelection').html(`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> <span>Add to Cart</span>`);
				// $('#addToCart__btn').attr('disabled', false).removeClass('missingVariationSelection').text('Add to Cart');
				$('.wishlist_btn').attr('disabled', false);
			},
		});
	});

})(jQuery)


</script>

@extends('front.layouts.appprofile')
@section('title', 'My Orders')

@section('section')
<section class="edit-sec edit-basic-detail">
    {{-- <div class="container">
        <div class="row">
            <div class="col-12 text-center top-heading">
                <h2>My Purchased Courses</h2>
            </div>
        </div>
    </div> --}}
    <div class="course-content-accordions">
        <div class="course-content-accordions">
        @forelse($orders as $o)
            <div class="course-content-accor">
                <div class="accor-top">
                    <div class="accor-top-left">
                        <!-- <i class="fa-solid fa-angle-down"></i> -->
                        <div>
                            <span>ORD ID: {!! $o->order_no !!} ({{$o->created_at}})</span>
                        </div>
                        
                        <i class="fa-solid fa-plus"></i>
                        <i class="fa-solid fa-minus"></i>
                    </div>
                    <!-- <div class="accor-top-right">
                        <div class="duraton">
                            <span>{{$o->created_at}}</span>
                        </div>
                    </div> -->
                </div>
                <div class="accor-content">
                    <ul class="list-unstyled p-0 m-0">
                    @foreach($o->orderProducts as $op)
                    @if($op->type == 1)
                    <li><a href="{{route('front.course.details', getProductSlug($op->course_id)->slug)}}">{{getProductSlug($op->course_id)->title}}</a></li>
                @endif
                @if($op->type == 4)
                    <div class="d-flex justify-content-between align-item-center">
                        <li>{{getSubscriptionDetails($op->course_id)->name}} Subscription - {{getSubscriptionDetails($op->course_id)->description}}</li> 
                        <span><a href="{{route('front.user.cancel.subscription')}}"><i class="fa fa-times text-danger"></i> Cancel Subscription</a></span>
                    </div>
                @endif
                @if($op->type == 5)
                    <li>Deal - {{getDealDetails($op->course_id)->title}}  </li>
                @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        @empty
            <div class="course-content-accor">
                <h3 class="text-center"> No Orders Yet! </h3>
            </div>
        @endforelse
        </div>
    </div>
</section>
@endsection

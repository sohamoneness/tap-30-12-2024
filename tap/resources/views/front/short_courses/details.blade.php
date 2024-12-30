@extends('front.layouts.appprofile')
@section('title',$course->title)

@section('section')
    <style>
        .a2a_svg svg {
            margin-right: 0 !important;
        }
    </style>

    <section class="artiledetails_banner eventDetails">
        <div class="container-fluid">
            <h1>{{ $course->title }}</h1>
            <div class="artiledetails_banner_img">
                @if(!empty($course->image))
                    <img class="w-100" src="{{ asset('Blogs/'.$course->image) }}" alt="">
                @else
                <img src="{{ asset('images/demo.png') }}" class="card-img-top"
                alt="">
                @endif
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </section>

    <section class="relevant-event-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Introduction</h2>
                    <p class="description">{{$course->introduction}}</p>
                </div>
            </div>
        </div>
    </section>
     <section class="relevant-event-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Key Learnings</h2>
                    <p class="description">{!!$course->key_learnings!!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="relevant-event-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Core Modules and Learnings</h2>
                    <table class="search_table">
                        <thead>
                            <th>Module</th>
                            <th>Description</th>
                            <th>Core Resources to Read</th>
                        </thead>
                        <tbody id="">
                            
                            @foreach($modules as $module)
                            <tr>
                                <td>{{$module->module}}</td>
                                <td>{{$module->description}}</td>
                                <td>{!!$module->resources!!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="relevant-event-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Tests and Exercises</h2>
                    <p class="description">Here are some tests and exercises to complete as part of the career development plan for improving your use of CTAs in your writing.

Please submit your completed tests or exercises to your Team Leader within the agreed timeframe for review and feedback.</p>
                    <h3>Tests</h3>
                    @foreach($tests as $test)
                    <h4>{{$test->title}}</h4>
                    {!!$test->description!!}
                    @endforeach
                    <h3>Exercises</h3>
                    @foreach($exercises as $exercise)
                    <h4>{{$exercise->title}}</h4>
                    {!!$exercise->description!!}
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
  function myCustomFunction() {
    //alert("2");
  var element = document.getElementById("eventShare");
  element.classList.toggle("show");
}
</script>
@push('scripts')
    <script async src="https://static.addtoany.com/menu/page.js"></script>
@endpush

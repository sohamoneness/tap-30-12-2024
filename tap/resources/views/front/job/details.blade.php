@extends('front.layouts.appprofile')
@section('title', ' Job')
@section('section')
    <section class="edit-sec edit-basic-detail">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.job.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-12 col-lg-8 col-md-12 mb-3 mb-lg-0">
                    <div class="course-details-left">
                        <div class="theiaStickySidebar">
                            <div class="course-details-left-content">
                                <div class="course-details-main-info">
                                    <div class="job-type">
                                        <span>
                                            <img src="{{ asset('frontend/img/clock.png') }}" alt="Time">
                                            Full Time
                                        </span>
                                    </div>
                                    <h2>{{ $job[0]->title ?? '' }}</h2>
                                    <!-- <p class="badge tag-badge">{{ $job[0]->category->title ?? '' }}</p> -->
                                    <div class="job-location">
                                        <span>
                                            <img src="{{ asset('frontend/img/map-pin.png') }}" alt="Time">
                                            California, USA
                                        </span>
                                    </div>
                                    <div class="job-short-desc">We are looking for a experienced Senior Front-End Developer with an advanced level of english to design UI/UX interface for web and mobile apps.</div>
                                    {{-- <!-- <p>
                                            {!! $job[0]->description !!}
                                        </p>
                                        <p>
                                            <b>Skill :</b>
                                            {{ $job[0]->skill ?? '' }}
                                        </p>
                                        <p>
                                            <b>Experience :</b>
                                            {{ $job[0]->experience ?? '' }}
                                        </p>
                                        <p>
                                            <b>Scope :</b>
                                            {{ $job[0]->scope ?? '' }}
                                        </p>
                                        <p>
                                            <b>Address :</b>
                                            {{ $job[0]->address ?? '' }}
                                        </p>
                                        <p>
                                            <b>Postcode :</b>
                                            {{ $job[0]->postcode ?? '' }}
                                        </p>
                                        <p>
                                            <b>City :</b>
                                            {{ $job[0]->city ?? '' }}
                                        </p>
                                        <p>
                                            <b>State :</b>
                                            {{ $job[0]->state ?? '' }}
                                        </p>
                                        <p>
                                            <b>Country :</b>
                                            {{ $job[0]->country ?? '' }}
                                        </p>
                                        <p>
                                            <b>Salary :</b>
                                            ${{ number_format($job[0]->payment) ?? '' }} per {{ $job[0]->salary ?? '' }}
                                        </p> 
                                    --> --}}
                                    <div class="jobsearch-jobDescriptionText">

                                        @if($job[0]->description)
                                            <h4>Job description</h4>
                                            <div class="job-desc">{!! $job[0]->description !!}</div>
                                        @endif

                                        <h4>Job Requirements</h4>
                                        
                                        <h5>Responsibilities:</h5>
                                        <ul>
                                            @foreach (explode('||',$job[0]->responsibility) as $item)
                                                @if($item != '')
                                                    <li>{{$item}}</li>
                                                @else
                                                <li>N/A</li>
                                                @endif
                                            @endforeach
                                            {{-- <li>Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms.</li>
                                            <li>Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team.</li>
                                            <li>Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications.</li>
                                            <li>Prepare and maintain all applications utilizing standard development tools.</li>
                                            <li>Utilize backend data services and contribute to increase existing data services API.</li>
                                            <li>Lead the entire web application development life cycle right from concept stage to delivery and post launch support.</li>
                                            <li>Convey effectively with all task progress, evaluations, suggestions, schedules along with technical and process issues.</li>
                                            <li>Document the development process, architecture, and standard components.</li>
                                            <li>Coordinate with co-developers and keeps project manager well informed of the status of development effort and serves as liaison between development staff and project manager.</li>
                                            <li>Keep abreast of new trends and best practices in web development.</li> --}}
                                        </ul>
                                        @if($job[0]->scope != '')
                                        <p><b>Scope: {{$job[0]->scope}}</b></p>
                                        @else
                                        <p><b>Scope: N/A</b></p>
                                        @endif

                                        <h5>Requirements and qualifications</h5>
                                        <ul>
                                            @foreach (explode('||',$job[0]->skill) as $item)
                                                @if($item != '')
                                                    <li>{{$item}}</li>
                                                @else
                                                <li>N/A</li>
                                                @endif
                                            @endforeach
                                            {{-- <li>Previous working experience as a PHP / Laravel developer for 2-3 years.</li>
                                            <li>Degree in Computer Science, Engineering, MIS or similar relevant field.</li>
                                            <li>In depth knowledge of object-oriented PHP and Laravel 5 PHP Framework.</li>
                                            <li>Hands on experience with SQL schema design, SOLID principles, REST API design.</li>
                                            <li>Creative and efficient problem solver.</li> --}}
                                        </ul>
                                        
                                        @if($job[0]->notice_period != '')
                                            {{-- <p><b>Notice period: Immediate joiners preferred</b>.</p> --}}
                                            <p><b>Notice period: {{$job[0]->notice_period}}</b></p>
                                        @else
                                            <p><b>Notice period: N/A</b></p>
                                        @endif

                                        @if($job[0]->experience)
                                            <p><b>Experience Required: {{$job[0]->experience}}</b></p>
                                        @else
                                            <p><b>Experience Required: N/A</b></p>
                                        @endif

                                        {{-- <p><b>Educational Qualification: </b> B.E/B.Tech/MCA.</p> --}}
                                        {{-- <p><b>Perks and Benefits: </b></p>
                                        <p>1) Provident Fund</p>
                                        <p>2) ESIC/Mediclaim</p>
                                        <p>3) Quarterly Incentives</p>
                                        <p>4) Early Joining Bonus</p>
                                        <p>5) Paid Vacation Leave</p>
                                        <p>6) Five days work in a Week (Monday to Friday).</p> --}}
                                        
                                        @if($job[0]->contact_number != '' && $job[0]->contact_information)
                                        <p><b>Contact Number: </b> <span class="jobsearch-JobDescription-phone-number"><a href="tel:{{$job[0]->contact_number}}">{{$job[0]->contact_number}}</a></span> ({{$job[0]->contact_information}})</p>
                                        @else
                                        <p><b>Contact Number: </b> <span class="jobsearch-JobDescription-phone-number"></span> N/A</p>
                                        @endif
                                        <p><b>Company Website: </b> <a href="{{$job[0]->company_website}}">{{$job[0]->company_website}}</a></p>
                                        
                                        <p><b>About {{$job[0]->company_name}}: </b></p>
                                        <div>
                                            {{$job[0]->company_desc}}
                                        </div>
                                        
                                        <p>Job Types: {{$job[0]->employment_type}}</p>

                                        @if($job[0]->payment != '' && $job[0]->salary != '')
                                            <p>Salary: ${{$job[0]->payment}} {{'per ' . $job[0]->salary}}</p>
                                        @else
                                        <p>Salary: N/A</p>
                                        @endif
                                        
                                        @if($job[0]->benifits)
                                            <p><b>Benefits:</b></p>
                                            <ul>
                                                @foreach (explode('||',$job[0]->benifits) as $item)
                                                    @if($item != '')
                                                        <li>{{$item}}</li>
                                                    @else
                                                    <li>N/A</li>
                                                    @endif
                                                @endforeach
                                                {{-- <li>Health insurance</li>
                                                <li>Paid sick time</li>
                                                <li>Provident Fund</li> --}}
                                            </ul>
                                        @endif

                                        <p><b>Schedule:</b></p>
                                        <ul>
                                            @foreach (explode(',',$job[0]->schedule) as $item)
                                                @if($item != '')
                                                    <li>{{$item}}</li>
                                                @else
                                                    <li>N/A</li>
                                                @endif
                                            @endforeach
                                            {{-- <li>Day shift</li>
                                            <li>Monday to Friday</li> --}}
                                        </ul>

                                        {{-- <p><b>Supplemental pay types:</b></p>
                                        <ul>
                                            <li>Performance bonus</li>
                                            <li>Yearly bonus</li>
                                        </ul> --}}

                                        {{-- <p>COVID-19 considerations: Yes</p> --}}
                                    </div>

                                    {{-- <div><p id="all_text">{!! $job[0]->description !!}</p></div> --}}
                                    <div class="content-mid">
                                        <ul class="list-unstyled p-0 m-0">
                                            {!! jobTagsHtml($job[0]->id) !!}
                                        </ul>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 mb-3 mb-lg-0 ">
                    <div class="sticky-top apply__job">
                     
                        <div class="card">
                            <div class="card-body">
                                <form id="jobApplyForm" class="form-container" method="POST">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job[0]->id }}">
                                    <div class="tile-body" style="display: none;">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger">
                                                    *</span></label>
                                            <input class="form-control @error('title') is-invalid @enderror" type="text"
                                                name="name" id="title"
                                                value="{{ old('title',auth()->guard('web')->user()->first_name .' ' .auth()->guard('web')->user()->last_name) }}" />
                                            @error('title')
                                                {{ $message ?? '' }}
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="control-label" for="email">Email<span> </span></label>
                                            <input type="text" class="form-control" rows="4" name="email" id="email"
                                                value="{{ old('email',auth()->guard('web')->user()->email) }}">
                                            @error('email')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="control-label" for="mobile">Mobile<span> </span></label>
                                            <input type="text" class="form-control" rows="4" name="mobile" id="email"
                                                value="{{ old('mobile',auth()->guard('web')->user()->mobile) }}">
                                            @error('email')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="control-label">Resume</label>
                                            <input class="form-control @error('cv') is-invalid @enderror" type="file"
                                                id="cv" name="cv" />
                                            @error('cv')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="job_modal_body_right">
                                        <div class="btn_group course-details-right-btn">
                                            <button type="submit" class="course-deails-btn" id="">Apply for this Job</button>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                      
                    </div>
                    <div class="job-information">
                        <ul class="list-unstyled p-0 m-0">
                            <li>
                                <label>Notice period:</label>
                                @if($job[0]->notice_period != '')
                                <p>{{$job[0]->notice_period}}</b></p>
                                @else
                                <p>N/A</b></p>
                                @endif
                            </li>
                            <li>
                                <label>Experience Required</label>
                                @if($job[0]->experience)
                                <p>{{$job[0]->experience}}</p>
                                @else
                                <p>N/A</p>
                                @endif
                            </li>
                            <li>
                                <label>Contact Number</label>
                                @if($job[0]->contact_number != '' && $job[0]->contact_information)
                                <p>{{$job[0]->contact_number}}</p>
                                @else
                                <p>N/A</p>
                                @endif
                            </li>
                            <li>
                                <label>Company Website</label>
                                <p>{{$job[0]->company_website}}</p>
                            </li>
                            <li>
                                <label>Job Types</label>
                                <p>{{$job[0]->employment_type}}</p>
                            </li>
                            <li>
                                <label>Salary</label>
                                @if($job[0]->payment != '' && $job[0]->salary != '')
                                <p>${{$job[0]->payment}} {{'per ' . $job[0]->salary}}</p>
                                @else
                                <p>N/A</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script>


    $('#jobApplyForm').on('submit', function(e) {
               e.preventDefault();
              var data = $(this).serialize();
              var url = '{{ route('front.job.apply') }}';
              $.ajax({
                  url: url,
                  type: "POST",
                  data: data,
                  success: function(result) {
                      toastFire("success", result.success);
                      window.open(result.url, '_blank');
                  },
              });
    });

    </script>
@endsection

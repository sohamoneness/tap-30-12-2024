@extends('front.layouts.appprofile')
@section('title', 'job')

@section('section')
<style>
    .list-group {
        max-height: none !important;
        padding: 20px;
    }
    .list-group-item-filter{
        padding: 2px;
    }
</style>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-3">
                <div class="jobs-filter-content">
                    <form action="{{ route('front.job.index') }}">
                        <div class="jobs-filter-heading">
                            <h6>filter</h6>
                            <!-- <a href="{{ url()->current() }}">
                                <span class="clear-filter"><small>Clear filter</small></span>
                            </a> -->
                        </div>
                        <div class="jobs-filter-keywords">
                            {{-- <h4>keywords</h4> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.45 19.7426L16.5435 15.8366C17.7448 14.4745 18.4064 12.7201 18.4035 10.9041C18.4035 8.90055 17.6235 7.01705 16.207 5.60055C14.7905 4.18405 12.907 3.40405 10.904 3.40405C8.901 3.40405 7.017 4.18405 5.6 5.60005C4.183 7.01605 3.4035 8.90005 3.4035 10.9036C3.4035 12.9071 4.1835 14.7901 5.6 16.2066C7.0165 17.6231 8.9 18.4036 10.9035 18.4036C12.7385 18.4036 14.4685 17.7421 15.836 16.5431L19.742 20.4491C19.7883 20.4956 19.8434 20.5326 19.9041 20.5579C19.9647 20.5831 20.0298 20.5961 20.0955 20.5961C20.1612 20.5961 20.2263 20.5831 20.2869 20.5579C20.3476 20.5326 20.4027 20.4956 20.449 20.4491C20.5427 20.3553 20.5954 20.2281 20.5954 20.0956C20.5954 19.963 20.5427 19.8358 20.449 19.7421L20.45 19.7426ZM6.307 15.5001C5.0795 14.2721 4.4035 12.6401 4.4035 10.9041C4.4035 9.16805 5.0795 7.53555 6.307 6.30755C7.535 5.08005 9.167 4.40405 10.9035 4.40405C12.64 4.40405 14.272 5.08005 15.5 6.30755C16.7275 7.53555 17.404 9.16755 17.404 10.9041C17.404 12.6406 16.7275 14.2721 15.5 15.5001C14.272 16.7276 12.64 17.4041 10.904 17.4041C9.168 17.4041 7.5345 16.7276 6.307 15.5001Z" fill="#262626"/>
                            </svg>
                            <input type="text" name="keyword" placeholder="Search" class="form-control" value="{{ request()->input('keyword') }}" />
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>Employment type</h4>

                            {{-- {{ dd(request()->input('employment_type')) }} --}}

                            <div class="checkbox-content">
                                <input type="checkbox" name="employment_type[]" id="fulltime" value="fulltime" {{ request()->input('employment_type') ? (in_array('fulltime', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                {{-- <input type="checkbox" name="employment_type[]" id="fulltime" value="fulltime" {{ request()->input('employment_type') == 'fulltime' ? 'checked' : '' }} /> --}}
                                <label for="fulltime">full time</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="remote" name="employment_type[]" value="remote" {{ request()->input('employment_type') ? (in_array('remote', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="remote">remote</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="freelance" name="employment_type[]" value="freelance" {{ request()->input('employment_type') ? (in_array('freelance', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="freelance">freelance</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="contract" name="employment_type[]" value="contract" {{ request()->input('employment_type') ? (in_array('contract', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="contract">contract</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="parttime" name="employment_type[]" value="parttime" {{ request()->input('employment_type') ? (in_array('parttime', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="parttime">part time</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="telecomute" name="employment_type[]" value="telecomute" {{ request()->input('employment_type') ? (in_array('telecomute', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="telecomute">telecommute</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="temporary" name="employment_type[]" value="temporary" {{ request()->input('employment_type') ? (in_array('temporary', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="temporary">temporary</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="internship" name="employment_type[]" value="internship" {{ request()->input('employment_type') ? (in_array('internship', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="internship">internship</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="unpaid" name="employment_type[]" value="unpaid" {{ request()->input('employment_type') ? (in_array('unpaid', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="unpaid">unpaid</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="checkbox" id="unpaid" name="employment_type[]" value="other" {{ request()->input('employment_type') ? (in_array('other', request()->input('employment_type')) ? 'checked' : '') : '' }} />
                                <label for="unpaid">other</label>
                            </div>
                        </div>
                        <div class="jobs-filter-checkbox job-filter-location">
                            <h4>location</h4>
                            <div class="checkbox-content">
                                <input type="checkbox" id="nearMe" />
                                <label for="nearMe">near me</label>
                            </div>
                            <div class="checkbox-content location-search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.45 19.7426L16.5435 15.8366C17.7448 14.4745 18.4064 12.7201 18.4035 10.9041C18.4035 8.90055 17.6235 7.01705 16.207 5.60055C14.7905 4.18405 12.907 3.40405 10.904 3.40405C8.901 3.40405 7.017 4.18405 5.6 5.60005C4.183 7.01605 3.4035 8.90005 3.4035 10.9036C3.4035 12.9071 4.1835 14.7901 5.6 16.2066C7.0165 17.6231 8.9 18.4036 10.9035 18.4036C12.7385 18.4036 14.4685 17.7421 15.836 16.5431L19.742 20.4491C19.7883 20.4956 19.8434 20.5326 19.9041 20.5579C19.9647 20.5831 20.0298 20.5961 20.0955 20.5961C20.1612 20.5961 20.2263 20.5831 20.2869 20.5579C20.3476 20.5326 20.4027 20.4956 20.449 20.4491C20.5427 20.3553 20.5954 20.2281 20.5954 20.0956C20.5954 19.963 20.5427 19.8358 20.449 19.7421L20.45 19.7426ZM6.307 15.5001C5.0795 14.2721 4.4035 12.6401 4.4035 10.9041C4.4035 9.16805 5.0795 7.53555 6.307 6.30755C7.535 5.08005 9.167 4.40405 10.9035 4.40405C12.64 4.40405 14.272 5.08005 15.5 6.30755C16.7275 7.53555 17.404 9.16755 17.404 10.9041C17.404 12.6406 16.7275 14.2721 15.5 15.5001C14.272 16.7276 12.64 17.4041 10.904 17.4041C9.168 17.4041 7.5345 16.7276 6.307 15.5001Z" fill="#262626"/>
                                </svg>
                                <input type="text" name="address" id="remote2" class="form-control" placeholder="Enter location city/state/postcode" />
                            </div>
                        </div>

                        <div class="jobs-filter-checkbox job-filter-salary">
                            <h4>Salary per</h4>
                            <div class="checkbox-content">
                                <input type="radio" id="year" class="year" name="salary" value="year" {{ request()->input('salary') == 'year' ? 'checked' : '' }}/>
                                <label for="year">year</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="hour" class="hour" name="salary" value="hour" {{ request()->input('salary') == 'hour' ? 'checked' : '' }}/>
                                <label for="hour">hour</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="month" class="month" name="salary" value="month" {{ request()->input('salary') == 'month' ? 'checked' : '' }}/>
                                <label for="month">month</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="article" class="article" name="salary" value="article" {{ request()->input('salary') == 'article' ? 'checked' : '' }}/>
                                <label for="article">article</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="word" class="word" name="salary" value="word" {{ request()->input('salary') == 'word' ? 'checked' : '' }}/>
                                <label for="word">word</label>
                            </div>
                        </div>

                        {{-- <div class="jobs-filter-checkbox job-filter-location">
                            <h4>Salary Estimate</h4>
                              <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item-filter"><input type="radio" name="payment" value="0-20000" {{ request()->input('payment') == '0-20000' ? 'checked' : '' }}>&nbsp; Under 20 Thousand</li>
                                    <li class="list-group-item-filter"><input type="radio" name="payment" value="20000-25000" {{ request()->input('payment') == '20000-25000' ? 'checked' : '' }} > &nbsp; 20 -25 Thousand</li>
                                    <li class="list-group-item-filter"><input type="radio" name="payment" value="25000-30000" {{ request()->input('payment') == '25000-30000' ? 'checked' : '' }}> &nbsp; 25 - 30 Thousand</li>
                                    <li class="list-group-item-filter"><input type="radio" name="payment" value="30000-40000" {{ request()->input('payment') == '30000-40000' ? 'checked' : '' }}> &nbsp; 30 - 40 Thousand</li>
                                    <li class="list-group-item-filter"><input type="radio" name="payment" value="40000-900000" {{ request()->input('payment') == '40000-900000' ? 'checked' : '' }}>&nbsp; Over 40 Thousand</li>                                   
                                </ul>
                            </div>
                        </div> --}}

                        <div class="jobs-filter-checkbox job-filter-location">
                            <h4>Salary Estimate</h4>
                        <div class="price-range-block">
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                              <div style="margin:30px auto" id="main">
                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" name="min_price" class="price-range-field"/>
                                <input type="number" min=0 max="50000" oninput="validity.valid||(value='50000');" id="max_price" name="max_price" class="price-range-field"/>
                            </div>
                        </div>
                        <div class="price-range-block">
                            <div style="margin:30px auto" id="not_main">
                              <input type="number" min="0" max="9900" oninput="validity.valid||(value='0');" id="min_price_flt"  class="price-range-field">
                              <input type="number" min="0" max="50000" oninput="validity.valid||(value='50000');" id="max_price_flt"  class="price-range-field">
                            </div>
                         </div>


                         </div>
                       

                        <div class="jobs-filter-checkbox job-filter-source">
                            <h4>Source</h4>
                            <div class="checkbox-content">
                                <input type="radio" id="indeed" class="indeed" name="source"
                                    value="indeed" {{ request()->input('source') == 'indeed' ? 'checked' : '' }} />
                                <label for="indeed">indeed</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="problogger" class="problogger" name="source"
                                    value="problogger" {{ request()->input('source') == 'problogger' ? 'checked' : '' }} />
                                <label for="problogger">problogger</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="medabistro" class="medabistro" name="source"
                                    value="medabistro" {{ request()->input('source') == 'medabistro' ? 'checked' : '' }} />
                                <label for="medabistro">mediabistro</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="journalism" class="journalism" name="source"
                                    value="journalism" {{ request()->input('source') == 'journalism' ? 'checked' : '' }}  />
                                <label for="journalism">Journalismjobs</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="writers" class="writers" name="source" value="freelance" {{ request()->input('source') == 'freelance' ? 'checked' : '' }} />
                                <label for="writers">Freelancewritinggigs</label>
                            </div>
                            <div class="checkbox-content">
                                <input type="radio" id="writers" class="writers" name="source" value="blogging" {{ request()->input('source') == 'blogging' ? 'checked' : '' }} />
                                <label for="writers">BloggingPro</label>
                            </div>
                        </div>

                        <div class="jobs-filter-checkbox job-filter-featured">
                            <h4>featured</h4>
                            <div class="checkbox-content">
                                <input type="checkbox" id="featured" name="featured_flag" value="1" {{ request()->input('featured_flag') == '1' ? 'checked' : '' }} />
                                <label for="featured">show only featured jobs</label>
                            </div>
                        </div>

                        <div class="jobs-filter-checkbox job-filter-beginner-friendly">
                            <h4>beginner friendly</h4>
                            <div class="checkbox-content">
                                <input type="checkbox" id="beginner" name="beginner_friendly" value="1" {{ request()->input('beginner_friendly') == '1' ? 'checked' : '' }}  />
                                <label for="beginner">show only beginner friendly jobs</label>
                            </div>
                        </div>

                        <div class="jobs-filter-checkbox job-filter-beginner-friendly">
                            <h4>Saved jobs</h4>
                            <div class="checkbox-content">
                                <input type="checkbox" id="savedJobs" name="saved_jobs" value="1" {{ request()->input('saved_jobs') == '1' ? 'checked' : '' }}  />
                                <label for="savedJobs">show only saved jobs</label>
                            </div>
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>saved filters</h4>
                            <div class="filterSearchBox">
                                <div class="row">
                                    <div
                                        class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                        <div class="select-floating-admin">
                                            <select class="form-control" name="key">
                                                <option value="" hidden selected>Select</option>
                                                @foreach ($saveItem as $index => $item)
                                                    <option value="{{ $item->keyword }}"
                                                        {{ request()->input('key')  == $item->keyword ? 'selected' : '' }}>
                                                        {{ucwords($item->keyword) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-filter-save">
                            <input type="hidden" name="filter" value="on">
                            <button type="submit" class="btn button">Search</button>
                        </div>
                    </form>
                    {{-- <form action="{{ route('front.job.search.save') }}" method="POST" role="form" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="keyword" placeholder="Enter keywords" class="form-control" value="{{ request()->input('keyword') }}" />
                        <div class="job-filter-save">
                            <button type="submit" class="btn button" >SAVE KEYWORD</button>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="col-12 col-lg-9 col-md-9">
                <div class="dashboard-featured">
                    {{-- <div class="page-title best_deal">
                        <p>
                            @if (request()->input('keyword') ||
                                request()->input('employment_type') ||
                                request()->input('address') ||
                                request()->input('salary') ||
                                request()->input('source') ||
                                request()->input('featured_flag') ||
                                request()->input('beginner_friendly'))
                                @if ($job->count() > 0)
                                    Results found for
                                    {{ request()->input('keyword') ? 'keyword "' . request()->input('keyword') . '"' : '' }}
                                    {{ !empty(request()->input('keyword')) && !empty(request()->input('employment_type')) && !empty(request()->input('address')) ? ' & ' : '' }}
                                    {{ request()->input('address') ? 'location "' . request()->input('address') . '"' : '' }}
                                    {{ request()->input('employment_type[]') ? 'type "' . request()->input('employment_type[]') . '"' : '' }}
                                    {{ request()->input('salary') ? 'salary "' . request()->input('price') . '"' : '' }}
                                    {{ request()->input('source') ? 'source "' . request()->input('source') . '"' : '' }}
                                @else
                                    No Result found for
                                    {{ request()->input('keyword') ? 'keyword "' . request()->input('keyword') . '"' : '' }}
                                    {{ !empty(request()->input('keyword')) && !empty(request()->input('employment_type')) && !empty(request()->input('address')) ? ' & ' : '' }}
                                    {{ request()->input('address') ? 'location "' . request()->input('address') . '"' : '' }}
                                    {{ request()->input('employment_type') ? 'type "' . request()->input('type') . '"' : '' }}
                                    {{ request()->input('salary') ? 'salary "' . request()->input('price') . '"' : '' }}
                                    {{ request()->input('source') ? 'source "' . request()->input('source') . '"' : '' }}
                                @endif
                            @endif
                        </p>
                    </div> --}}
                    <!-- <div class="top-info">
                        @if (!request()->input('filter'))
                            <span>Showing all jobs</span>
                        @else
                            @if ($job->count() > 0)
                                <span>Results found.</span>
                            @else
                                <span>No Results found. Please try again with a different filter.</span>
                            @endif
                        @endif
                        <a href="{{ route('front.job.search.saved') }}" class="add-btn-edit d-inline-block" style="padding: 6px 12px;">All Saved Filters</a>
                    </div> -->
                    <div class="row">
                        @foreach ($job as $data)
                            @if (request()->input('featured_flag') == '1')
                                @if ($data->featured_flag == 0)
                                    @continue
                                @endif
                            @endif

                            @if (request()->input('saved_jobs') == '1')
                                @if (!savedJobs($data->id))
                                    @continue
                                @endif
                            @endif
                             @if (interestJobs($data->id))
                             @continue
                             @endif
                             @if (reportJobs($data->id))
                             @continue
                             @endif
                            <div class="col-12 col-lg-6 col-md-12 mb-4">
                                <div class="recommended-writers-content">                                        
                                    {{--@if ($data->featured_flag)
                                    <div class="featured-jobs-badge">
                                        <span>featured</span>
                                    </div>
                                    @endif--}}
                                    <div class="content-top">
                                        <div class="content-top-info">
                                            <div class="row1">
                                                <div class="row-left">
                                                    <img src="{{ asset('frontend/img/job-icon.png') }}" alt="Job">
                                                </div>
                                                <div class="row-right">
                                                    <h4>{{ $data->title }}</h4>
                                                    <span>{{ $data->category->title }}</span>
                                                </div>
                                            </div>
                                            <p class="small text-muted mt-3 short-desc">{!! $data->short_description !!}</p>
                                            {{-- <p>
                                                {!! $data->description !!}
                                            </p> --}}
                                            <div class="row2">
                                                <ul class="list-unstyled m-0 p-0">
                                                    <li>
                                                        <img src="{{ asset('frontend/img/map-pin.png') }}" alt="Job">
                                                        London
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('frontend/img/clock.png') }}" alt="Job">
                                                        Full Time
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('frontend/img/calendar2.png') }}" alt="Job">
                                                        1hour ago
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- <div class="featured-jobs-badge wishlish">
                                            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0)" class="wishlist_button nav-link" onclick="jobBookmark({{ $data->id }})">
                                                    @php
                                                        if (
                                                            auth()
                                                                ->guard('user')
                                                                ->check()
                                                        ) {
                                                            $collectionExistsCheck = \App\Models\JobUser::where('job_id', $data->id)
                                                                ->where(
                                                                    'user_id',
                                                                    auth()
                                                                        ->guard('web')
                                                                        ->user()->id,
                                                                )
                                                                ->first();
                                                        } else {
                                                            $collectionExistsCheck = \App\Models\JobUser::where('job_id', $data->id)
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
                                                        Save Job
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    {{-- <a href="javascript:void(0)" class="wishlist_button" onclick="jobInterest({{ $data->id }})"> --}}
                                                        <form id="form" action="{{route('front.job.interest',$data->id)}}" method="POST">@csrf</form>
                                                        <a href="javascript:void(0)"  class="nav-link" onclick="document.getElementById('form').submit()">
                                                    @php
                                                        if (
                                                            auth()
                                                                ->guard('user')
                                                                ->check()
                                                        ) {
                                                            $collectionExistsCheck = \App\Models\NotInterestedJob::where('job_id', $data->id)
                                                                ->where(
                                                                    'user_id',
                                                                    auth()
                                                                        ->guard('web')
                                                                        ->user()->id,
                                                                )
                                                                ->first();
                                                        } else {
                                                            $collectionExistsCheck = \App\Models\NotInterestedJob::where('job_id', $data->id)
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
                                                        <i class="fas fa-ban" id="interestBtn_{{$data->id}}"></i>
                                                        Not interested
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a type="button" class="wishlist_button nav-link" data-bs-toggle="modal" data-bs-target="#yourModal{{$data->id}}">
                                                    @php
                                                        if (
                                                            auth()
                                                                ->guard('user')
                                                                ->check()
                                                        ) {
                                                            $collectionExistsCheck = \App\Models\ReportJob::where('job_id', $data->id)
                                                                ->where(
                                                                    'user_id',
                                                                    auth()
                                                                        ->guard('web')
                                                                        ->user()->id,
                                                                )
                                                                ->first();
                                                        } else {
                                                            $collectionExistsCheck = \App\Models\ReportJob::where('job_id', $data->id)
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
                                                        <i class="fas fa-flag" id="reportBtn_{{$data->id}}"></i>
                                                        Report job
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    
                                    {!! jobTagsHtml($data->id) !!}
                                    <div class="line"></div>

                                    <div class="content-btm">
                                        <a href="{{ route('front.job.details', $data->slug) }}" class="add-btn-edit d-inline-block">
                                            View Details
                                            <!-- <img src="assets/img/arrow-right-freelance.png" alt="" /> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="yourModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column align-items-start">
                                            <div class="d-flex align-items-center w-100">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$data->title}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <h6 id="exampleModalLabel">{{$data->company_name}}</h6>
                                        </div>
                                        <form action="{{ route('front.job.report',$data->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <div class="form-group">

                                                    <textarea type="text" class="form-control" rows="4" name="comment" id="comment" placeholder="Describe your problem">{{ old('comment') }}</textarea>

                                                    @error('comment')
                                                        <p class="small text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="add-btn-edit d-inline-block">Report</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-12 text-end pagination-custom">
                            {{ $job->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

    $('#not_main').hide();
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
//    console.log(vars['max_price']);
//    console.log(vars['min_price']);
   if(typeof vars['max_price'] != 'undefined'){
      $('#main').hide();
      $('#not_main').show();
    $('#max_price_flt').val(vars['max_price']);
   }
   if(typeof vars['min_price'] != 'undefined'){
     $('#main').hide();
     $('#not_main').show();
    $('#min_price_flt').val(vars['min_price']);
   }
   
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 50000,
		values: [0, 50000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  //$("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

});
   
</script>
@endsection

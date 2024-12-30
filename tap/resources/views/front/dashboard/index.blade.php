@extends('front.layouts.appprofile')
@section('title', 'Dashboard')

@section('section')
<style>
  .dashboard-stats-content-link {
    width: 100%;
    height: 100%;
  }
</style>
<div class="dashboard-content">
    <div class="dashboard-stats">
        {{-- <div class="top-info">
            <span>today's writing stats</span>
            <a href="" class="show-all">show all</a>
        </div> --}}
        <div class="row">
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ route('front.user.courses.index') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat1.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Purchased Course</span>
                        <h4>{{count($orders)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('user/job?keyword=&address=&saved_jobs=1&filter=on') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat2.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Saved Jobs</span>
                        <h4>{{count($job)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            @if(Auth::guard('web')->user()->type==1)
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ route('front.project.index') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat3.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Total Projects</span>
                        <h4>{{count($project)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            @endif
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('client') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat3.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>My Clients</span>
                        <h4>{{getMyClients(Auth::guard('web')->user()->id)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('user/task') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat1.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Total Tasks</span>
                        <h4>{{getTotalTasks(Auth::guard('web')->user()->id)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('user/task') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat2.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Pending tasks</span>
                        <h4>{{getPendingTasksCount(Auth::guard('web')->user()->id)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('user/task') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat3.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Completed Tasks</span>
                        <h4>{{getCompletedTasksCount(Auth::guard('web')->user()->id)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-3 col-md-4 mb-4">
              <a href="{{ url()->to('user/task') }}" class="dashboard-stats-content-link">
                <div class="dashboard-stats-content">
                    <div class="icon">
                      <img src="{{ asset('frontend/img/stat3.png') }}" alt="">
                    </div>
                    <div class="typed">
                        <span>Approved Tasks</span>
                        <h4>{{getApprovedTasksCount(Auth::guard('web')->user()->id)}}</h4>
                    </div>
                    {{-- <div class="line"></div>
                    <div class="times">
                        <span><strong class="count">0</strong> per minute</span>
                    </div> --}}
                </div>
              </a>
            </div>
        </div>
    </div>

    <div class="dashboard-documents">
        <!-- <div class="top-info">
            <span>recent orders</span>
            <a href="{{route('front.user.orders')}}" class="show-all">show all</a>
        </div> -->
        <div class="row mt-3">
            <div class="col-12">
                {{-- <ul class="list-unstyled p-0 m-0 recent-documents">
                    <li>
                        <h6 class="">
                            <i class="fa-solid fa-folder"></i> Lorem ipsum dolor
                            sit amet.
                        </h6>
                        <div class="document-right">
                            <span>recently edited</span>
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li>
                        <h6>
                            <i class="fa-solid fa-folder"></i> Lorem ipsum dolor
                            sit amet.
                        </h6>
                        <div class="document-right">
                            <span>recently edited</span>
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li>
                        <h6>
                            <i class="fa-solid fa-folder"></i> Lorem ipsum dolor
                            sit amet.
                        </h6>
                        <div class="document-right">
                            <span>recently edited</span>
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                </ul> --}}
                <div class="course-content-accordions" style="display: none">
                  @foreach($orders as $o)
                      <div class="course-content-accor">
                          <div class="accor-top">
                              <div class="accor-top-left">
                                  <i class="fa-solid fa-angle-down"></i>
                                  <span>ORD ID: {!! $o->order_no !!}</span>
                              </div>
                              <div class="accor-top-right">
                                  <div class="duraton">
                                      <span>{{$o->created_at}}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="accor-content">
                              <ul class="list-unstyled p-0 m-0">
                              @foreach($o->orderProducts as $op)
                                @if($op->type == 1)
                                    {{-- <li><a href="{{route('front.course.details', getProductSlug($op->course_id)->slug)}}">{{getProductSlug($op->course_id)->title}}</a></li> --}}
                                  @if(getProductSlug($op->course_id))
                                    <li><a href="{{route('front.course.details', getProductSlug($op->course_id)->slug)}}">{{getProductSlug($op->course_id)->title}}</a></li>
                                  @endif
                                @endif
                                @if($op->type == 4)
                                  @if(getSubscriptionDetails($op->course_id))
                                    <li>{{getSubscriptionDetails($op->course_id)->name}} Subscription - {{getSubscriptionDetails($op->course_id)->description}}</li>
                                  @endif
                                @endif
                                @if($op->type == 5)
                                    <li>{{getDealDetails($op->course_id)->title}} Subscription - {{getDealDetails($op->course_id)->description}}</li>
                                  @if(getDealDetails($op->course_id))
                                    <li>{{getDealDetails($op->course_id)->title}} Deals - {{getDealDetails($op->course_id)->description}}</li>
                                  @endif                                          
                                @endif
                              @endforeach
                              </ul>
                          </div>
                      </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="dashboard-messages mt-3">
        <div class="top-info">
            <span>recent messages</span>
            <a href="" class="show-all">show all</a>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <ul class="list-unstyled p-0 m-0">
                    <li>
                        <p class="msg">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Tenetur eos est enim similique vitae impedit
                            quod beatae, nulla ipsum nostrum aliquam
                            reprehenderit, unde laboriosam dolores sit
                            obcaecati, velit iusto tempora!
                        </p>
                        <a href="" class="view-msg">view msg</a>
                    </li>
                    <li>
                        <p class="msg">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Tenetur eos est enim similique vitae impedit
                            quod beatae, nulla ipsum nostrum aliquam
                            reprehenderit, unde laboriosam dolores sit
                            obcaecati, velit iusto tempora!
                        </p>
                        <a href="" class="view-msg">view msg</a>
                    </li>
                    <li>
                        <p class="msg">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Tenetur eos est enim similique vitae impedit
                            quod beatae, nulla ipsum nostrum aliquam
                            reprehenderit, unde laboriosam dolores sit
                            obcaecati, velit iusto tempora!
                        </p>
                        <a href="" class="view-msg">view msg</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}

    {{-- <div class="dashboard-featured mt-3">
        <div class="top-info">
            <span>recent featured jobs</span>
            <a href="" class="show-all">show all</a>
        </div>
        <div class="row mt-2 g-2">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6">
                <div class="recommended-writers-content">
                    <div class="featured-jobs-badge">
                      <span>featured</span>
                    </div>
                    <div class="content-top">
                      <div class="content-top-info">
                        <h4>Lorem ipsum dolor sit?</h4>
                        <span>Education and curriculum writer </span>
                        <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Consequatur vitae necessitatibus optio. Quos
                          laborum voluptatum libero cumque alias accusantium
                          asperiores!
                        </p>
                      </div>
                    </div>

                    <div class="content-mid">
                      <ul class="list-unstyled p-0 m-0">
                        <li>Copywriting</li>
                        <li>Social media</li>
                        <li>+ 10 more</li>
                      </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                      <a href="">
                        get started now
                        <img
                          src="{{ asset('frontend/img/arrow-right-freelance.png')}}"
                          alt=""
                        />
                      </a>
                    </div>
                  </div>
            </div>
        </div>
    </div> --}}

    
    <div class="row">
      <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">

          <div class="heading">
            <h3>Projects</h3>
          </div>
          <div class="data-content">
            <ul class="list-type-1">
            @php
            $projects = getMyProjects(Auth::guard('web')->user()->id);
            //echo "<pre>";
            //print_r($projects);
            @endphp
            @foreach($projects as $project)
              <li>
                <div class="icon">
                  <img src="{{ asset('frontend/img/file_1.png') }}" alt="Icon">
                </div>
                <div class="data">
                  <label>{{$project->title}}</label>
                 <label>{{substr($project->short_desc,0,50)}}...</label>
                </div>
                <div class="status">
                  <a href="javscript:void(0)" class="task-status">{{count($project->taskDetail)}} tasks</a>
                </div>
              </li>
            @endforeach
              
            </ul>
          </div>

        </div>
      </div>
      @php
        $activity = getActivies(Auth::guard('web')->user()->id);
        @endphp
        <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">
          <div class="heading" style="margin-bottom: 30px;">
            <h3>My Tasks</h3>
          </div>
          <div class="data-content" style="margin-top:30px;">
            <!-- <div class="project-content-mid-card-btm" style="padding-bottom: 30px;"> -->
                @foreach($activity as $obj)
                @if($obj->type =='task')
                <div class="project-content-right-el p-0">
                    <div class="content-left">
                        <div class="month">{{ \Carbon\Carbon::parse($obj->task->created_at)->format('M')}}</div>
                        <div class="date">{{ \Carbon\Carbon::parse($obj->task->created_at)->format('d')}}</div>
                    </div>
                    <div class="content-right">
                        <div class="row1">{{$obj->user->first_name.' '.$obj->user->last_name}}</div>
                        <div class="row2">
                            <span>{{ \Carbon\Carbon::parse($obj->task->created_at)->format('h:i a')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle cx="2" cy="2" r="2" fill="#D2D2D2"/>
                            </svg>
                            <span>Task: #{{$obj->task->id}} - {{$obj->task->title}}</span>
                        </div>
                        <div class="row3">
                            <span class="status added">{{$obj->task->status}}</span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
          <!-- </div> -->
        </div>
      </div>
      </div>
    </div>
     @php
        $notes = getProjectNote(Auth::guard('web')->user()->id);
    @endphp
    <div class="row">
      <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">
          <div class="heading">
            <h3>Project Notes</h3>
          </div>
          <div class="data-content">
            <ul class="list-type-1 list-type-2">
                @foreach($notes as $n)
              <li>
                <div class="data">
                  <label>{{$n->title}}</label>
                  <label>{{substr($n->description,0,50)}}...</label>
                </div>
                <!-- <div class="status">
                  <a href="javscript:void(0)" class="task-status complete"></a>
                </div> -->
              </li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">
          <div class="heading">
            <h3>Comments</h3>
          </div>
          @foreach($activity as $obj)
        @if($obj->type== 'comment')
        <div class="project-content-right-el p-0">
            <div class="content-left">
                <div class="month">{{ \Carbon\Carbon::parse($obj->comment->created_at)->format('M')}}</div>
                <div class="date">{{ \Carbon\Carbon::parse($obj->comment->created_at)->format('d')}}</div>
            </div>
            <div class="content-right">
                <div class="row1">{{$obj->user->first_name.' '.$obj->user->last_name}}</div>
                <div class="row2">
                    <span>{{ \Carbon\Carbon::parse($obj->comment->created_at)->format('h:i a')}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                        <circle cx="2" cy="2" r="2" fill="#D2D2D2"/>
                    </svg>
                    <span>Comment: {{$obj->comment->comment}}</span>
                </div>
                <div class="row3">
                    <span class="status added">Added</span>
                </div>
            </div>
        </div>
        @endif
        @endforeach
          </div>
        </div>
      </div>
    </div>
    @php
    $events = getMyEvents(Auth::guard('web')->user()->id);
    $clients = getClients(Auth::guard('web')->user()->id);
    @endphp
    <div class="row">
      <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">
          <div class="heading">
            <h3>My Events</h3>
            <!-- <a href="">
              <img src="{{ asset('frontend/img/menu-dots-horizontal.png') }}" alt="Email">
            </a> -->
          </div>
          <div class="data-content">
            <ul class="list-type-1">
            @foreach($events as $event)
              <li>
                <div class="icon">
                  <img src="{{ asset('frontend/img/file_1.png') }}" alt="Icon">
                </div>
                <div class="data">
                  <label>{{$event->event->title}}</label>
                  <label>Start Date: {{date("d-M-Y",strtotime($event->event->start_date))}}</label>
                </div>
              </li>
            @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12 mb-4">
        <div class="dashboard-data-box">
          <div class="heading">
            <h3>My Clients</h3>
          </div>
          <div class="data-content">
            <ul class="list-type-1">
            @foreach($clients as $client)
              <li>
                <div class="icon">
                  <img src="{{ asset('frontend/img/file_1.png') }}" alt="Icon">
                </div>
                <div class="data">
                  <label>{{$client->client_name}}</label>
                  <label>Email Id: {{$client->email_id}}</label>
                </div>
                <div class="status">
                  <a href="javscript:void(0)" class="task-status pending">Total Projects: {{count($client->projects)}}</a>
                </div>
              </li>
            @endforeach
              
            </ul>
          </div>
            
        </div>
      </div>
    </div>


</div>
@endsection

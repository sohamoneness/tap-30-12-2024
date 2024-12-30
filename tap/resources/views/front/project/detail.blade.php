@extends('front.layouts.appprofile')
@section('title', 'Project detail')

@section('section')

<style>
    /* .detail-info-top {
        margin-left:14px;
    } */   
</style>

    <section class="project-content">
        <div class="project-content-header">
            <div class="heading row1">
                <h3>
                    <a href="{{ route('front.project.index') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i></a>
                    Project Details
                </h3>
                <div class="cta-panel">
                    <a href="" class="btnn export-btn">
                        <!-- <i class="fa-solid fa-file-csv"></i>  -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M6.66663 14.1667L9.99996 17.5L13.3333 14.1667" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 10V17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.3999 15.075C18.1244 14.5655 18.6677 13.8385 18.951 12.9993C19.2343 12.1601 19.2428 11.2525 18.9753 10.4082C18.7078 9.56387 18.1782 8.82675 17.4633 8.30381C16.7485 7.78087 15.8856 7.49931 14.9999 7.5H13.9499C13.6993 6.52323 13.2304 5.61604 12.5784 4.84674C11.9264 4.07743 11.1084 3.46606 10.186 3.05863C9.2635 2.65121 8.26065 2.45836 7.25288 2.4946C6.24512 2.53084 5.25871 2.79523 4.36791 3.26786C3.47711 3.74049 2.70513 4.40905 2.1101 5.2232C1.51507 6.03735 1.11249 6.97588 0.932662 7.96813C0.752836 8.96038 0.800453 9.9805 1.07193 10.9517C1.3434 11.9229 1.83166 12.8198 2.49994 13.575" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Export
                    </a>
                    <div class="search">
                        <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="" placeholder="Search">
                        <button type="submit">
                            <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.4499 19.7425L16.5434 15.8365C17.7447 14.4745 18.4063 12.7201 18.4034 10.904C18.4034 8.90049 17.6234 7.01699 16.2069 5.60049C14.7904 4.18399 12.9069 3.40399 10.9039 3.40399C8.90094 3.40399 7.01694 4.18399 5.59994 5.59999C4.18294 7.01599 3.40344 8.89999 3.40344 10.9035C3.40344 12.907 4.18344 14.79 5.59994 16.2065C7.01644 17.623 8.89994 18.4035 10.9034 18.4035C12.7384 18.4035 14.4684 17.742 15.8359 16.543L19.7419 20.449C19.7883 20.4956 19.8433 20.5326 19.904 20.5578C19.9647 20.583 20.0297 20.596 20.0954 20.596C20.1611 20.596 20.2262 20.583 20.2869 20.5578C20.3475 20.5326 20.4026 20.4956 20.4489 20.449C20.5427 20.3552 20.5953 20.2281 20.5953 20.0955C20.5953 19.9629 20.5427 19.8358 20.4489 19.742L20.4499 19.7425ZM6.30694 15.5C5.07944 14.272 4.40344 12.64 4.40344 10.904C4.40344 9.16799 5.07944 7.53549 6.30694 6.30749C7.53494 5.07999 9.16694 4.40399 10.9034 4.40399C12.6399 4.40399 14.2719 5.07999 15.4999 6.30749C16.7274 7.53549 17.4039 9.16749 17.4039 10.904C17.4039 12.6405 16.7274 14.272 15.4999 15.5C14.2719 16.7275 12.6399 17.404 10.9039 17.404C9.16794 17.404 7.53444 16.7275 6.30694 15.5Z" fill="#262626"/>
                            </svg>
                        </button>
                    </div>
                    <a href="{{ route('front.project.task.create', $data->id) }}" class="add-project btnn">
                        <!-- <i class="fa-solid fa-circle-plus"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Add New Task
                    </a>
                </div>
            </div>
            <div class="heading row2">
                <div class="pro-content-header-left">
                    <ul class="list-unstyled p-0 m-0">
                    <li><a href="" class="active"> Overview</a></li>
                    <li><a href="{{ route('front.project.task.list',$data->slug) }}"> Task List</a></li>
                    <li><a href="{{ route('front.project.task.kanban-board-task', $data->id) }}" class="">Task Kanban</a></li>
                    <li><a href="{{ route('front.project.note.index', $data->slug) }}" class="">Notes</a></li>
                    <li><a href="{{ route('front.project.file.index', $data->slug) }}" class="">Files</a></li>
                    <li><a href="{{ route('front.project.comment.index', $data->slug) }}" class="">Comments</a></li>
                    <li><a href="{{ route('front.project.feedback.index', $data->slug) }}" class="">Customer Feedback</a></li>
                    </ul> 
                </div>
                <div class="pro-content-header-right">
                    <form action="" method="GET">
                        <div class="statuss">
                            <div class="select">
                                <select name="search_status" class="">
                                    <option value="" selected disabled>Select Status</option>
                                    @foreach ($status as $s)
                                        <option value="{{ $s->slug }}" {{request()->input('search_status') == $s->slug ? 'selected' : ''}}>{{ $s->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

    <div class="project-detail">
        <!-- <div class="detail-info-top">
            <div class="row my-3">
                <div class="col-md-6">
                    {{-- <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p> --}}
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('front.project.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
                </div>
            </div>

            <div class="row mt-0">
                <div class="col-md-12">
                    <h5 class="mb-3">{{$data->title}}</h5>

                    {{-- <p class="text-muted"><small>Project created {{ date('j F Y g:i A', strtotime($data->created_at)) }}</small></p>

                    <p class="mb-0 mt-4">Description:</p>

                    <p class="text-muted"><small>{{ $data->short_desc }}</small></p> --}}
                </div>
            </div>
        </div> -->

        <div class="project-content p-0">
            {{--<div class="project-content-header">
            <div class="pro-content-header-left">
                <!-- <h3 class="mb-0">Project List:</h3> -->
                <ul class="list-unstyled p-0 m-0">
                <li><a href="" class="active"> Overview</a></li>
                <li><a href="{{ route('front.project.task.list',$data->slug) }}"> Task List</a></li>
                <li><a href="{{ route('front.project.task.kanban-board-task', $data->id) }}" class="">Task Kanban</a></li>
                <li><a href="{{ route('front.project.note.index', $data->slug) }}" class="">Notes</a></li>
                <li><a href="{{ route('front.project.file.index', $data->slug) }}" class="">Files</a></li>
                <li><a href="{{ route('front.project.comment.index', $data->slug) }}" class="">Comments</a></li>
                <li><a href="{{ route('front.project.feedback.index', $data->slug) }}" class="">Customer Feedback</a></li>
                </ul> 
            </div>
            <div class="header-btns header-btns-detail">
                <!-- <a href="" class="kanban-btn btnn">kanban board</a> -->
                <a href="{{ route('front.project.task.create', $data->id) }}" class="add-project btnn"
                ><i class="fa-solid fa-circle-plus"></i> create new task</a
                >
            </div>
            </div>--}}
            <div class="project-content-mid">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="project-content-mid-top">
                                <!-- <div class="row g-3"> -->
                                    <!-- <div class="col-12 col-md-6"> -->
                                        <h4 class="project-content-mid-top-title">{{$data->title}}</h4>
                                        

                                        <div class="project-content-mid-card">
                                            <div class="project-content-mid-card-top">
                                                
                                                <div class="progress-chart">
                                                    <div class="chart" id="gaugeChart"></div>
                                                </div>
                                            </div>
                                            <div class="project-content-mid-card-btm">
                                                <ul class="list-unstyled p-0 m-0">
                                                    <li><span>Start date:</span> {{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y')}}</li>
                                                    <li><span>End date:</span> {{ \Carbon\Carbon::parse($data->deadline)->format('d-m-Y')}}</li>
                                                    @if(isset($data->client))
                                                    <li><span>Client:</span> <a href="{{route('front.client.detail',$data->client->id)}}">{{$data->client->client_name}}</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="project-content-mid-top-desc" style="margin-top: 30px;">{{ $data->short_desc }}</p>
                                    <!-- </div> -->
                                    @php
                                        $stateReportNameArray = $stateReportValueArray = [];
                                        foreach($stateWiseReport as $item){
                                        $stateReportNameArray[] = ($item->status == null) ? 'NA' : $item->status;
                                        $stateReportValueArray[]=($item->count == null) ? 0 : $item->count;
                                        }
                                    @endphp
                                    <!-- <div class="col-12 col-md-6">
                                        <div class="project-content-mid-card project-content-mid-card2">
                                            <canvas class="piechart" id="myChart" width="1000" height="1000"></canvas>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            </div>

                            
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="project-content-mid-card project-content-right-card">
                                <div class="project-content-mid-card-header p-0">
                                    <h4>Activity Log</h4>
                                </div>
                                <div class="project-content-mid-card-btm">
                                    @foreach($activity as $obj)
                                
                                    @if($obj->type =='file')
                                    <div class="project-content-right-el p-0">
                                        @if (!empty($obj->file))
                                           
                                        <div class="content-left">
                                            <div class="month">{{ \Carbon\Carbon::parse($obj->file->created_at)->format('M')}}</div>
                                            <div class="date">{{ \Carbon\Carbon::parse($obj->file->created_at)->format('d')}}</div>
                                        </div> 
                                        <div class="content-right">
                                            <div class="row1">{{$obj->user->first_name.' '.$obj->user->last_name}}</div>
                                            <div class="row2">
                                                <span>{{ \Carbon\Carbon::parse($obj->file->created_at)->format('h:i a')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                                    <circle cx="2" cy="2" r="2" fill="#D2D2D2"/>
                                                </svg>
                                                <span>File: {{$obj->file->file_extension}}</span>
                                            </div>
                                            <div class="row3">
                                                <span class="status added">Added</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    @elseif($obj->type =='task')
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
                                    
                                    @elseif($obj->type== 'comment')
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
                                    @elseif($obj->type== 'feedback')
                                    <div class="project-content-right-el p-0">
                                        <div class="content-left">
                                            <div class="month">{{ \Carbon\Carbon::parse($obj->feedback->created_at)->format('M')}}</div>
                                            <div class="date">{{ \Carbon\Carbon::parse($obj->feedback->created_at)->format('d')}}</div>
                                        </div>
                                        <div class="content-right">
                                            <div class="row1">{{$obj->user->first_name.' '.$obj->user->last_name}}</div>
                                            <div class="row2">
                                                <span>{{ \Carbon\Carbon::parse($obj->feedback->created_at)->format('h:i a')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                                    <circle cx="2" cy="2" r="2" fill="#D2D2D2"/>
                                                </svg>
                                                <span>Customer feedback: {{$obj->feedback->comment}}</span>
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

                        <div class="col-md-3 col-12">
                            <div class="project-content-mid-card project-content-right-card">
                                <div class="project-content-mid-card-header p-0">
                                    <h4>Task Reports</h4>
                                </div>
                                <div class="project-content-mid-card">
                                    <div class="chart" id="donutChart"></div>
                                    @foreach($activity as $obj)
                                
                                    
                                    @if($obj->type =='task')
                                    <div class="project-content-right-el p-0" style="margin-top:20px;">
                                        
                                        <div class="content-right">
                                            
                                            <div class="row2">
                                                <span>Task: #{{$obj->task->id}} - {{$obj->task->title}}</span>
                                            </div>
                                            <div class="row3">
                                                <span class="status added">{{$obj->task->status}}</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    @endif

                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    </div>
</section> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    var xValues = [];
    var yValues = [];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145",
      "#ADD8E6",
      "#FFA500",
      "#52595D",
      "#C9C0BB",
      "#C9C0BB",
      "#838996",
      "#566D7E",
      "#151B54",
      "#0000CD",
      "#2554C7",
      "#357EC7",
      "#3090C7",
      "#3BB9FF",
      "#B7CEEC",
      "#C6DEFF",
      "#E3E4FA",
      "#EBF4FA",
      "#00FFFF",
      "#81D8D0",
      "#48D1CC",
      "#3EA99F",
      "#808000",
      "#4E5B31",
      "#347235",
     "#004225",
     "#3F9B0B",
     "#9DC209",
    "#DAEE01",
     "#FFFACD"
    ];
    xValues = <?php echo json_encode($stateReportNameArray); ?>;
    yValues = <?php echo json_encode($stateReportValueArray); ?>;
    console.log(yValues);
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: ""
        }
      }
    });
    @if($data->taskDetail->count() > 0)
    var task_complete_val = {{round((CompletedTasks($data->id)/$data->taskDetail->count())*100,2)}};
    @else
    var task_complete_val = 0;
    @endif
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
  console.log('task>>',task_complete_val);
  var options1 = {
    series: [task_complete_val],
    chart: {
        type: 'radialBar',
        fontFamily: "'Outfit', sans-serif",
        height: 300,
        offsetY: 0,
        width: '100%',
        responsive: true
    },
    plotOptions: {
        radialBar: {
            startAngle: -90,
            endAngle: 90,
            hollow: {
              margin: 0,
              size: '80%',
            },
            track: {
                background: "#D9D9D9",
                strokeWidth: '160%',
                margin: 0,
                dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  opacity: 0,
                  blur: 0
                }
            },
            dataLabels: {
                name: {
                    show: true,
                    color: '#262626',
                    fontSize: '16px',
                    fontWeight: 400,
                    offsetY: 5
                },
                value: {
                    show: true,
                    offsetY: -50,
                    fontSize: '32px',
                    fontWeight: 700,
                    color: '#000000'
                }
            },
            innerRadius: 5
        }
    },
    grid: {
        padding: {
            top: 0
        }
    },
    fill: {
        type: 'solid',
        gradient: {
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
        },
        colors: ['#95C800']
    },
    stroke: {
        lineCap: 'round'
    },
    labels: ['Task Completion'],
  };

  var chart1 = new ApexCharts(document.querySelector("#gaugeChart"), options1);
  chart1.render();

  var options2 = {
    series: [{{getIceboxTasks($data->id)}},{{getTodoTasks($data->id)}},{{getInProgressTasks($data->id)}}, {{getClientreviewedTasks($data->id)}}, {{CompletedTasks($data->id)}}, {{getInApprovedTasks($data->id)}}, {{getInSpareTasks($data->id)}}],
    labels: ['Ice Box', 'To-Do', 'In-Progress', 'Client-Review', 'Completed', 'Approved','Spare'],
    chart: {
      type: 'donut',
      height: 300,
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      position: 'bottom',
      fontSize: '10px',
      fontFamily: "'Quicksand', sans-serif",
      fontWeight: 600,
      horizontalAlign: 'left',
      itemMargin: {
        horizontal: 0,
      },
      markers: {  
        width: 16,
        height: 16,
        radius: 0,
      }
    },
    plotOptions: {
      pie: {
        customScale: 1,
        startAngle: 130,
        endAngle: -230
      }
    },
    //colors: ['#B8673A','#95C800','#1B6ECB','#B8673A','#95C800','#1B6ECB','#B8673A']
  };

  var chart2 = new ApexCharts(document.querySelector("#donutChart"), options2);
  chart2.render();
});
</script>
@endsection


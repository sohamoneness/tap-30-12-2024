@extends('front.layouts.appprofile')
@section('title', 'Project wise Task Kanban')

@section('section')
<style>
    .div2 {
      width: 350px;
      height: 70px;
      padding: 10px;
      margin: 10px 0px 10px 0px;
      /* border: 1px solid #aaaaaa; */
    }
    .column {
        flex-shrink: 0;
        width: 25%;
        max-width: 25%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-top: var(--bs-gutter-y);
    }
    </style>
    <!-- <div class="kanban-info-top">
      <div class="row my-3">
            <div class="col-md-6">
          
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('front.project.task.list',$project->slug) }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
        </div>

        {{-- <div class="row mt-0">
            <div class="col-md-12">
                <h5 class="mb-3">{{$project->title}}</h5>

                <p class="text-muted"><small>Project created {{ date('j F Y g:i A', strtotime($project->created_at)) }}</small></p>

                <p class="mb-0 mt-4">Description:</p>

                <p class="text-muted"><small>{{ $project->short_desc }}</small></p>
            </div>
        </div> --}}
    </div> -->

      <div class="project-content">
        <div class="project-content-header">
          <div class="heading row1">
            <h3>
                <a href="{{ route('front.project.task.list',$project->slug) }}" class="btn btn-back">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                Project Details
            </h3>
            <div class="cta-panel">
              <form action="" class="ms-auto d-flex align-items-center">
                <div class="search">
                  <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="" placeholder="Search by title">
                  <button type="submit">
                    <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M20.4499 19.7425L16.5434 15.8365C17.7447 14.4745 18.4063 12.7201 18.4034 10.904C18.4034 8.90049 17.6234 7.01699 16.2069 5.60049C14.7904 4.18399 12.9069 3.40399 10.9039 3.40399C8.90094 3.40399 7.01694 4.18399 5.59994 5.59999C4.18294 7.01599 3.40344 8.89999 3.40344 10.9035C3.40344 12.907 4.18344 14.79 5.59994 16.2065C7.01644 17.623 8.89994 18.4035 10.9034 18.4035C12.7384 18.4035 14.4684 17.742 15.8359 16.543L19.7419 20.449C19.7883 20.4956 19.8433 20.5326 19.904 20.5578C19.9647 20.583 20.0297 20.596 20.0954 20.596C20.1611 20.596 20.2262 20.583 20.2869 20.5578C20.3475 20.5326 20.4026 20.4956 20.4489 20.449C20.5427 20.3552 20.5953 20.2281 20.5953 20.0955C20.5953 19.9629 20.5427 19.8358 20.4489 19.742L20.4499 19.7425ZM6.30694 15.5C5.07944 14.272 4.40344 12.64 4.40344 10.904C4.40344 9.16799 5.07944 7.53549 6.30694 6.30749C7.53494 5.07999 9.16694 4.40399 10.9034 4.40399C12.6399 4.40399 14.2719 5.07999 15.4999 6.30749C16.7274 7.53549 17.4039 9.16749 17.4039 10.904C17.4039 12.6405 16.7274 14.272 15.4999 15.5C14.2719 16.7275 12.6399 17.404 10.9039 17.404C9.16794 17.404 7.53444 16.7275 6.30694 15.5Z" fill="#262626"></path>
                    </svg>
                  </button>
                </div>
              </form>
              <a href="{{ route('front.project.create') }}" class="add-project btnn">
                <!-- <i class="fa-solid fa-circle-plus"></i>  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Create new task</a>
            </div>
          </div>
          <div class="heading row2">
            <div class="pro-content-header-left">
              <ul class="list-unstyled p-0 m-0">
                <li><a href="{{route('front.project.detail',$project->slug)}}" > Overview</a></li>
                <li><a href="{{ route('front.project.task.list',$project->slug) }}"> Task List</a></li>
                <li><a href="" class="active">Task Kanban</a></li>
                <li><a href="{{ route('front.project.note.index', $project->slug) }}" class="">Notes</a></li>
                <li><a href="{{ route('front.project.file.index', $project->slug) }}" class="">Files</a></li>
                <li><a href="{{ route('front.project.comment.index', $project->slug) }}" class="">Comments</a></li>
                <li><a href="{{ route('front.project.feedback.index', $project->slug) }}" class="">Customer Feedback</a></li>
              </ul>
            </div>
            <div class="pro-content-header-right">
              <form action="">
                <div class="statuss">
                  <div class="select">
                    <select name="search_deadline" class="">
                      <option value="" selected disabled>Deadline</option>
                        @foreach ($deadline as $key=>$val)
                        <option value="{{ $val }}" {{request()->input('search_deadline') == $val ? 'selected' : ''}}>{{ $key }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- <div class="header-btns">
            
            <a href="" class="add-project btnn"
              ><i class="fa-solid fa-circle-plus"></i> create new task</a
            >
          </div> -->
        </div>

        <div class="project-content-body">
            {{--<div class="project-content-body-top">
              
              <div class="project-content-body-top-right project-content-body-top-right-list kanban-flex">
                <!-- <div class="export">
                  <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn"
                    ><i class="fa-solid fa-file-csv"></i> export as esv</a
                  >
                </div> -->
                <form action="" method="GET">
                  <div class="select">
                    <select name="search_deadline" class="">
                      <option value="" selected disabled>Deadline</option>
                      @foreach ($deadline as $key=>$val)
                      <option value="{{ $val }}" {{request()->input('search_deadline') == $val ? 'selected' : ''}}>{{ $key }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="search">
                    <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="" placeholder="Search by title">
                    <button type="submit">
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>--}}
        </div>
      <section class="edit-sec project-task-kanban-board">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="data__scroll">
                        @foreach ($data as $key=>$statu)
                        <?php 
                            switch ($key) {
                                case "icebox":
                                $color = "#97ca2b";
                                break;
                                case "to-do":
                                $color = "#FF9033";
                                break;
                                case "in-progress":
                                $color = "#0576e4";
                                break;
                                case "client-review":
                                $color = "#33B5FF";
                                break;
                                case "completed":
                                $color = "#2fa100";
                                break;
                                case "approved":
                                $color = "#68FF33";
                                break;
                                case "spare":
                                $color = "#be0076";
                                break;
                                case "updates":
                                $color = "#00c79a";
                                break;
                            }
                        ?>
                        <div class="column">
                          <div class="wrap">
                            <h4 class="data__head" dropable="false">
                              <span style="background-color:<?php echo $color;?>"></span>
                              {{$key}}
                            </h4>
                            <div class="data__box__slide">
                                @foreach ($statu as $stat)
                                <p class="data__box" draggable="true" droppable="false" ondragstart="drag(event)" id="<?php echo $stat->id?>" style="background-color:<?php echo $color.'40';?>">{{ $stat->title }}</p>
                                @endforeach
                            </div>
                            <div class="data__drop" id="<?php echo $key?>" ondrop="drop(event)" ondragover="allowDrop(event)">
                                <span>Drag & Drop</span>
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
@section('script')
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    //alert(ev.target.id);
    //alert(document.getElementById(data).id);
    var itemStatus  =  ev.target.id;
    var itemID =   document.getElementById(data).id;
    var url = '{{route('front.project.task.updateStatus')}}';
    //alert(itemID);
    //alert(itemStatus);
    if(isNaN(itemStatus)){
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token : "{{csrf_token()}}",
                            status : itemStatus,
                            id : itemID,
                        },
                        success:function(response){
                            
                            ev.target.appendChild(document.getElementById(data));
                            toastFire("success", response.message);
                            //window.location.reload();
                            //setInterval('location.reload()', 7000);
                        },
                        error: function(response){
                            toastFire("warning", response.message);
                        }
                    });
        
    }else{
            toastFire("warning", "Please Drop on Empty area");
    }  
    
}
</script>
@endsection

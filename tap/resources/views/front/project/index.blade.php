@extends('front.layouts.appprofile')
@section('title', 'Project')

@section('section')

<style>
    /* @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap"); */

/* body,
html {
  width: 100%;
  overflow-x: hidden;
  font-family: "Montserrat", sans-serif !important;
}
a {
  text-decoration: none !important;
  display: inline-block;

}

a:hover {
  text-decoration: none !important;
} */


/* .project-content {
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,.07);
    border: 1px solid #f2f4f6;
    border-radius: 3px;
}
.project-content-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 16px;
    border-bottom: 1px solid #f2f4f6;
}
.project-content-header h3 {
    text-transform: capitalize;
    font-size: 20px;
    margin-bottom: 0;
    font-weight: 400px!important;
}
.project-content-header .header-btns {
    display: flex;
    align-items: center;
    justify-content: center;
}
.project-content a.btnn {
    border: 1px solid #719604;
    margin: 0 6px;
    color: #719604;
    padding: 5px 14px;
    border-radius: 3px;
    font-size: 15px;
    text-transform: capitalize;
    transition: all .3s ease-in-out;
}
.project-content a.btnn:hover {
    background: #719604;
    color: #fff;
}
.project-content a.btnn i {
    color: #719604;
    margin-right: 4px;
    transition: all .3s ease-in-out;
}
.project-content a.btnn:hover i {
    color: #fff;
}
.project-content-body-top {
    padding: 14px;
}
.project-content-body-top span {
    font-size: 14px;
    color: #666;
}
.project-content-body-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.project-content-body-top .project-content-body-top-right form {
    display: flex;
    align-items: center;
}
.project-content-body-top .project-content-body-top-right form .search {
    margin-left: 10px;
    border: 1px solid #eee;
    height: 40px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.project-content-body-top .project-content-body-top-right form .search input {
    border: none;
    width: 100%;
    height: 100%;
    padding: 0 10px;
    font-size: 15px;
    outline: none;
}
.project-content-body-top .project-content-body-top-right form .search button {
    height: 100%;
    border: none;
    background: none;
    color: #719604;
    padding: 0 10px;
}
.project-content-body-top .project-content-body-top-right form .select select {
    border: none;
    background: none;
    text-transform: capitalize;
    font-size: 15px;
    color: #333;
    height: 100%;
    cursor: pointer;
}
.project-content-body-top .project-content-body-top-right form .select select option {
    text-transform: capitalize;
   
}
.project-content-body-top .project-content-body-top-right form .select {
    border: 1px solid #f2f4f6;
    height: 40px;
    line-height: 40px;
    padding: 0 6px;
    cursor: pointer;
    border-radius: 3px;
}
.project-content-body-top-right {
    display: flex;
    align-items: center;
}
.project-content-body-top-right .export-btn {
    margin-right: 9px!important;
    height: 40px;
    line-height: 30px;
    border-color: #f2f4f6!important;
}
.project-content-body-top-right .export-btn i {
    color: #719604;
    margin-right: 5px;
    transition: all .3s ease-in-out;
}
.project-content-body-top-right .export-btn:hover {
    border-color: #719604!important;
}
.project-content-body-top-right .export-btn:hover i {
    color: #fff;
}
.project-content-body-content th {
    font-size: 14px;
    font-weight: 500;
}
.project-content-body-content thead tr {
    border-color: #eee;
}
.project-content-body-content thead tr th {
    border-left: none;
    padding: 10px 14px;
    vertical-align: middle;
    border-color: #eee;
    font-size: 13px;
}
.project-content-body-content thead tr th:last-child {
    border: none;
}
.project-content-body-content tbody tr td {
    padding: 10px 14px;
    vertical-align: middle;
    font-size: 13px;
    color: #333;
    border-color: #eee;
    width: 10%;
}
.project-content-body-content tbody tr {
    border-color: #eee;
}
.project-content-body-content tbody tr td:nth-child(3) {
    width: 160px;
}
.project-content-body-content tbody tr td:nth-child(7) {
    width: 0px;
}
.project-content-body-content tbody tr td:nth-child(5) {
    width: 10px;
}
.project-content-body-content tbody .task {
    border: 1px solid #719604;
    color: #719604;
    padding: 3px 7px;
    border-radius: 3px;
    text-transform: capitalize;
    font-size: 13px;
    font-weight: 500;
    transition: all .3s ease-in-out;
}
.project-content-body-content tbody .task:hover {
    background: #719604;
    color: #fff;
}
.project-content-body-content tbody .task i {
    margin-right: 2px;
    font-size: 12px;
}
.project-content-body-content tbody td select {
    border: none;
    background: none;
    border: 1px solid #719604;
    border-radius: 3px;
    padding: 3px 8px;
    text-transform: capitalize;
    color: #719604;
    cursor: pointer;
    font-size: 12px;
    font-weight: 500;
    width: 80px;
}
.project-content-body-content tbody td:last-child {
    width: 106px;
}
.action-btns {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.action-btns a.action-btn {
    border: 1px solid #f1f1f1;
    color: #111;
    border-radius: 50px;
    min-width: 25px;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 4px 2px;
    font-size:13px;
    transition: all .3s ease-out;
}
.action-btns a.action-btn:hover {
    background: #719604;
    color: #fff;
    border-color: #719604;
}
.project-content-btm {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 14px;
}
.project-content-btm ul {
    display: flex;
    align-items: center;
    border: 1px solid #f3f3f3;
    overflow: hidden;
    border-radius: 3px;
}
.project-content-btm ul li {
    padding: 10px 16px;
    border-right: 1px solid #f1f1f1;
    font-size: 13px;
    cursor: pointer;
    transition: all .3s ease-in-out;

}
.project-content-btm ul li.active {
    background: #719604;
    color: #fff;
}
.project-content-btm ul li:hover {
    background: #719604;
    color: #fff;
    border-color: #719604;
}
.project-content-body-content .title {
    font-size: 14px;
}
.pagination-custom {
    padding: 20px;
}
.pro-content-header-left h3 {
    margin-right: 20px;
}
.pro-content-header-left {
    display: flex;
    align-items: center;
}
.project-content-header .pro-content-header-left ul {
    display: flex;
    align-items: center;
}
.project-content-header .pro-content-header-left ul li a {
    padding: 20px;
    text-transform: capitalize;
    color: #111;
    font-size: 15px;
}
.project-content-header .pro-content-header-left ul li a.active {
    border-bottom: 2px solid #719604;
} */
</style>

    <section class="project-content">
        <div class="project-content-header">
            <div class="heading row1">
                <h3>Projects</h3>
                <div class="cta-panel">
                    <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn">
                        <!-- <i class="fa-solid fa-file-csv"></i>  -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M6.66663 14.1667L9.99996 17.5L13.3333 14.1667" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 10V17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.3999 15.075C18.1244 14.5655 18.6677 13.8385 18.951 12.9993C19.2343 12.1601 19.2428 11.2525 18.9753 10.4082C18.7078 9.56387 18.1782 8.82675 17.4633 8.30381C16.7485 7.78087 15.8856 7.49931 14.9999 7.5H13.9499C13.6993 6.52323 13.2304 5.61604 12.5784 4.84674C11.9264 4.07743 11.1084 3.46606 10.186 3.05863C9.2635 2.65121 8.26065 2.45836 7.25288 2.4946C6.24512 2.53084 5.25871 2.79523 4.36791 3.26786C3.47711 3.74049 2.70513 4.40905 2.1101 5.2232C1.51507 6.03735 1.11249 6.97588 0.932662 7.96813C0.752836 8.96038 0.800453 9.9805 1.07193 10.9517C1.3434 11.9229 1.83166 12.8198 2.49994 13.575" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Export
                    </a>
                    <a href="javascript:void(0)" class="btnn export-btn">
                        <!-- <i class="fa-solid fa-file-csv"></i>  -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <g clip-path="url(#clip0_21_181)">
                                <path d="M13.3328 13.3333L9.99947 10L6.66614 13.3333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.99951 10V17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9911 15.325C17.8039 14.8819 18.446 14.1807 18.816 13.3322C19.1861 12.4836 19.263 11.536 19.0346 10.6389C18.8063 9.74179 18.2857 8.94626 17.555 8.37787C16.8244 7.80948 15.9252 7.50061 14.9995 7.5H13.9495C13.6972 6.52436 13.2271 5.61861 12.5744 4.85082C11.9218 4.08304 11.1035 3.47321 10.1812 3.06717C9.25894 2.66113 8.2566 2.46946 7.24958 2.50657C6.24255 2.54367 5.25703 2.80858 4.36713 3.28138C3.47722 3.75419 2.70607 4.42258 2.11166 5.23631C1.51726 6.05005 1.11505 6.98794 0.935295 7.97949C0.755537 8.97104 0.8029 9.99044 1.07382 10.961C1.34475 11.9317 1.83218 12.8282 2.49948 13.5833" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3328 13.3333L9.99947 10L6.66614 13.3333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_21_181">
                                <rect width="20" height="20" fill="white" transform="translate(-0.000488281)"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Import
                    </a>
                    <a href="{{ route('front.project.create') }}" class="add-project btnn">
                        <!-- <i class="fa-solid fa-circle-plus"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Add project
                    </a>
                </div>
            </div>
            <div class="heading row2">
                <div class="pro-content-header-left">
                    <!-- <ul class="list-unstyled p-0 m-0">
                    <li><a href="" class="active">List</a></li>
                    <li><a href="{{ route('front.project.kanban-board') }}">Kanban</a></li>
                    </ul> -->
                </div>
                <div class="pro-content-header-right">
                    <form action="" method="GET">
                        <div class="search">
                            <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="" placeholder="Search by title">
                            <button type="submit">
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.4499 19.7425L16.5434 15.8365C17.7447 14.4745 18.4063 12.7201 18.4034 10.904C18.4034 8.90049 17.6234 7.01699 16.2069 5.60049C14.7904 4.18399 12.9069 3.40399 10.9039 3.40399C8.90094 3.40399 7.01694 4.18399 5.59994 5.59999C4.18294 7.01599 3.40344 8.89999 3.40344 10.9035C3.40344 12.907 4.18344 14.79 5.59994 16.2065C7.01644 17.623 8.89994 18.4035 10.9034 18.4035C12.7384 18.4035 14.4684 17.742 15.8359 16.543L19.7419 20.449C19.7883 20.4956 19.8433 20.5326 19.904 20.5578C19.9647 20.583 20.0297 20.596 20.0954 20.596C20.1611 20.596 20.2262 20.583 20.2869 20.5578C20.3475 20.5326 20.4026 20.4956 20.4489 20.449C20.5427 20.3552 20.5953 20.2281 20.5953 20.0955C20.5953 19.9629 20.5427 19.8358 20.4489 19.742L20.4499 19.7425ZM6.30694 15.5C5.07944 14.272 4.40344 12.64 4.40344 10.904C4.40344 9.16799 5.07944 7.53549 6.30694 6.30749C7.53494 5.07999 9.16694 4.40399 10.9034 4.40399C12.6399 4.40399 14.2719 5.07999 15.4999 6.30749C16.7274 7.53549 17.4039 9.16749 17.4039 10.904C17.4039 12.6405 16.7274 14.272 15.4999 15.5C14.2719 16.7275 12.6399 17.404 10.9039 17.404C9.16794 17.404 7.53444 16.7275 6.30694 15.5Z" fill="#262626"/>
                                </svg>
                            </button>
                        </div>
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
                        <button class="saveBTN d-inline-block" type="submit" style="margin-left: 15px;">
                            <!-- <i class="fas fa-check-circle"></i> -->
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="project-content-body">
          {{--<div class="project-content-body-top">
            <div class="project-content-body-top-left">
              <span>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records</span>
            </div>
            <div class="project-content-body-top-right">
              <div class="export">
                <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn"
                  ><i class="fa-solid fa-file-csv"></i> Export</a>
              </div>
              <form action="" method="GET">
                <div class="statuss">
                <label for="" class="status-label">Status</label>
                <div class="select">
                    <select name="search_status" class="">
                        <option value="" selected disabled>Status</option>
                        @foreach ($status as $s)
                            <option value="{{ $s->slug }}" {{request()->input('search_status') == $s->slug ? 'selected' : ''}}>{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="search">
                <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="" placeholder="Search by title">
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div>
          </div> --}}

          <div class="project-content-body-content">
            <div class="table-responsive">
              <table class="table mb-0 rounded">
                <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Tasks</th>
                    <th>Document</th>
                    <th>Status</th>
                    <th>Task Completion</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td class="title"><span>{{ $item->title }}</span></td>
                                <td>
                                    <p><small>@if($item->short_desc != ''){{ substr($item->short_desc,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <a href="{{ route('front.project.detail', $item->slug) }}" class="badge task-badge">{{ $item->taskDetail->count() }} {{ ($item->taskDetail->count() > 1) ? 'Tasks' : 'Task' }}</a>
                                </td>
                                <td class="text-center">
                                    @if ($item->document)
                                        <a href="{{ asset($item->document) }}" class="badge download-badge" download>
                                            <!-- <i class="fas fa-download"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M14 10V12.6667C14 13.0203 13.8595 13.3594 13.6095 13.6095C13.3594 13.8595 13.0203 14 12.6667 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667V10" stroke="#262626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.66663 6.66667L7.99996 10L11.3333 6.66667" stroke="#262626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 10V2" stroke="#262626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Download
                                        </a>
                                    @else
                                        <p><i class="fas fa-info-circle text-secondary"></i></p>
                                    @endif
                                </td>
                                <td>
                                    {{-- <span class="badge text-success" data-toggle="tooltip" title="{{ $item->statusDetail->icon ?? ''}}">{!! $item->statusDetail->icon ?? ''.' '.ucwords($item->status) !!}</span> --}}
                                    <select onchange="changeProjectAndTaskStatus(`{{route('front.project.updateStatus')}}`,this,'{{$item->id}}')" name="status" id="status" data-original="{{$item->status}}" class="">
                                        <option value="" selected disabled>Change Status</option>
                                        @foreach ($status as $s)
                                            <option value="{{ $s->slug }}" {{$item->status == $s->slug ? 'selected' : ''}}>{{ $s->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group mb-3 spare_input{{$item->id}}" style="display: none;">
                                        <input type="text" name="spare{{$item->id}}" class="form-control" placeholder="Name...">
                                        <button class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-check"></i></button>
                                        <span class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-times"></i></span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if($item->taskDetail->count() > 0)
                                        <div class="com-task-wrap">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{round((CompletedTasks($item->id)/$item->taskDetail->count())*100,2)}}%" aria-valuenow="{{round((CompletedTasks($item->id)/$item->taskDetail->count())*100,2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="com-task">{{round((CompletedTasks($item->id)/$item->taskDetail->count())*100,2)}}%</span>
                                        </div>
                                    @else
                                        <!-- <span class="com-task">0 Task</span> -->
                                    @endif
                                </td>
                                <td>
                                    <div class="action-panel">
                                        <a target="_blank" href="{{ route('front.project.detail', $item->slug) }}" class="badge action-badge">
                                            <!-- <i class="fas fa-eye"></i>  -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M0.666626 8.00001C0.666626 8.00001 3.33329 2.66667 7.99996 2.66667C12.6666 2.66667 15.3333 8.00001 15.3333 8.00001C15.3333 8.00001 12.6666 13.3333 7.99996 13.3333C3.33329 13.3333 0.666626 8.00001 0.666626 8.00001Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a target="_blank" href="{{ route('front.project.edit', $item->id) }}" class="badge action-badge">
                                            <!-- <i class="fas fa-edit"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M8 13.3333H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('front.project.delete', $item->id) }}" class="badge action-badge" onclick="return confirm('Are you sure?')">
                                            <!-- <i class="fas fa-trash"></i>  -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.6667 3.99999V13.3333C12.6667 13.6869 12.5262 14.0261 12.2762 14.2761C12.0261 14.5262 11.687 14.6667 11.3334 14.6667H4.66671C4.31309 14.6667 3.97395 14.5262 3.7239 14.2761C3.47385 14.0261 3.33337 13.6869 3.33337 13.3333V3.99999M5.33337 3.99999V2.66666C5.33337 2.31304 5.47385 1.9739 5.7239 1.72385C5.97395 1.4738 6.31309 1.33333 6.66671 1.33333H9.33337C9.687 1.33333 10.0261 1.4738 10.2762 1.72385C10.5262 1.9739 10.6667 2.31304 10.6667 2.66666V3.99999" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6.66663 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.33337 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        @if($item->status =='approved' || $item->status =='completed')
                                        <a href="{{ route('front.project.invoice.detail', $item->id) }}" class="badge bg"> 
                                            <!-- <i class="fa-solid fa-file-invoice"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M11 17c0 .11.16 1 2 1 3.16 0 4 2 4 3s-.66 2.55-3 2.92V25a1 1 0 0 1-2 0v-1.08a3.56 3.56 0 0 1-2.42-1.32A2.8 2.8 0 0 1 9 21a1 1 0 0 1 2 0c0 .14.16 1 2 1 2 0 2-1 2-1s-.16-1-2-1c-3.16 0-4-2-4-3s.66-2.52 3-2.88V13a1 1 0 0 1 2 0v1.12c2.34.36 3 2 3 2.88a1 1 0 0 1-2 0c0-.18-.18-1-2-1s-2 .87-2 1Zm16-7v17a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h12a1 1 0 0 1 .76.35l6 7A1 1 0 0 1 27 10Zm-6-1h2.83L21 5.7Zm4 2h-5a1.05 1.05 0 0 1-.71-.29A1 1 0 0 1 19 10V4H8a1 1 0 0 0-1 1v22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1Zm-9-5h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2Z" data-name="Layer 6" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>

                
              </table>
            </div>
          </div>

          @if (count($data) > 0)
                <div class="pagination-custom">
                    {{ $data->appends($_GET)->links() }}
                </div>
                @endif
        </div>
</section>





@endsection


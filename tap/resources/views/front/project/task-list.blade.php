@extends('front.layouts.appprofile')
@section('title', 'Project wise task list')

@section('section')

<style>
    .detail-info-top {
        margin-left:14px;
    }
</style>

    <section class="project-content">
        <div class="project-content-header">
            <div class="heading row1">
                <h3>
                    <a href="{{ route('front.project.index') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i></a>
                    Project Details
                </h3>
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
                    <li><a href=""> Overview</a></li>
                    <li><a href="{{ route('front.project.task.list',$data->slug) }}" class="active"> Task List</a></li>
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
                        <a href="{{ route('front.project.detail',$data->slug) }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
                    </div>
                </div>
            </div> -->

            <div class="project-content p-0">
                {{--<div class="project-content-header">
                    <div class="pro-content-header-left">
                        <!-- <h3 class="mb-0">Project List:</h3> -->
                        <ul class="list-unstyled p-0 m-0">
                        <li><a href="{{route('front.project.detail',$data->slug)}}" > Overview</a></li>
                        <li><a href="" class="active"> Task List</a></li>
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

                <div class="project-content-body">
                    {{--<div class="project-content-body-top">
                        <!-- <div class="project-content-body-top-left">
                        <span> Task List:  </span>
                        </div> -->
                        <div class="project-content-body-top-right kanban-flex">
                            <div class="export">
                                <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn"
                                ><i class="fa-solid fa-file-csv"></i> export as CSV</a
                                >
                            </div>
                            <form action="">
                                <div class="select">
                                <select name="search_status" id="">
                                    <option value="" disabled selected>status</option>
                                    @foreach ($status as $s)
                                                <option value="{{ $s->slug }}" {{request()->input('search_status') == $s->slug ? 'selected' : ''}}>{{ $s->title }}</option>
                                            @endforeach
                                </select>
                                </div>
                                <div class="search">
                                <input type="search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Search by title" />
                                <button type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>--}}

                    <div class="project-content-body-content">
                        <div class="table-responsive">
                            <table class="table mb-0 task-list-table">
                                <thead>
                                    <tr>
                                        <th>SR</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Document</th>
                                        <th>Comments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                    
                                <tbody>
                                    @forelse ($tasks as $index => $item)
                                        <tr class="task-row">
                                            <td>
                                                {{ $index + $tasks->firstItem() }}.
                                            </td>
                                            <td class="task-title">
                                                <a href="{{ route('front.project.task.detail', $item->slug) }}">
                                                    {{ ucwords($item->title) }}
                                                </a>
                                            </td>
                                            <td><p class="short-desc">{{ $item->short_desc }}</p></td>
                                            <td class="download-link">
                                                @if ($item->document)
                                                    <a href="{{ asset($item->document) }}" class="badge bg-success download-badge d-inline-block" download>
                                                        <i class="fas fa-download"></i>
                                                        Download
                                                    </a>
                                                @else
                                                    <p><i class="fas fa-info-circle text-secondary"></i></p>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('front.project.task.detail', $item->slug) }}" class="text-success"><u><small>View task details</small></u></a>
                                            </td> --}}
                                            <div class="task-update position-static">
                                                {{-- <div class="dropdown"> --}}
                                                <td>
                                                    <a type="button" class="badge bg-success download-badge d-inline-block" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                                        @php
                                                        $totalComments = totalComments($item->id);
                                                        @endphp
                                                        {{ $totalComments->comment_count <= 1 ? $totalComments->comment_count . ' Comment' : $totalComments->comment_count . ' Comments' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="position-relative">
                                                        <select onchange="changeProjectAndTaskStatus(`{{route('front.project.task.updateStatus')}}`,this,'{{$item->id}}')" data-original="{{$item->status}}" name="status" id="status" height="24px" class="form-control">
                                                            <option value="" selected disabled>Change Status</option>
                                                            @foreach ($status as $s)
                                                                <option value="{{$s->slug}}" {{ ($s->slug == $item->status) ? 'selected' : '' }}>{{$s->title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group mb-3 spare__input__group spare_input{{$item->id}}" style="display: none;">
                                                            <input type="text" name="spare{{$item->id}}" class="form-control " placeholder="Name...">
                                                            <button class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-check"></i></button>
                                                            <span class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-times"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item text-muted" href="{{ route('front.project.task.edit', $item->id) }}">Edit</a></li>
                                                        <li><a class="dropdown-item text-muted" href="{{ route('front.project.task.delete', $item->id) }}" onclick="return confirm('Are you sure ?')">Delete</a></li>
                                                        <li><a class="dropdown-item text-muted" href="{{ route('front.project.task.invoice.detail', $item->id) }}">Invoice</a></li>
                                                    </ul>
                                                </td>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comments for {{$item->title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('front.project.task.comment.update',$item->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="task_id" value="{{$item->id}}">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="comment">Comment</label>
                                                                    <div class="row">
                                                                        @php
                                                                            $comment= App\Models\TaskComment::where('task_id', $item->id)->where('user_id',Auth::guard('web')->user()->id)->with('task')->orderby('id','desc')->get();
                                                                        @endphp
                                                                        @foreach($comment as $key => $data)
                                                                        {{-- {{dd($comment)}} --}}
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                            <p>{{$data->comment}}</p>
                                                                            <div class="d-flex justify-content-between">
                                                                                <div class="d-flex flex-row align-items-center">
                                                                                <p class="small text-muted mb-0 "></p>
                                                                                    @if ($data->doc)
                                                                                    <a href="{{ asset($data->doc) }}" class="badge bg-success download-badge" download>
                                                                                        <i class="fas fa-download"></i>
                                                                                        Download
                                                                                    </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <textarea type="text" class="form-control" rows="4" name="comment" id="comment" placeholder="Your notes">{{ old('comment') }}</textarea>

                                                                    @error('comment')
                                                                        <p class="small text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="doc">Upload Document (optional)</label>

                                                                    <input type="file" class="form-control" rows="4" name="doc" id="doc" value="{{ old('doc') }}">
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    @error('doc')
                                                                        <p class="small text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="submit" class="add-btn-edit d-inline-block">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @empty
                                        <tr width="100%">
                                            <td colspan="7" class="text-center">
                                                <div class="col-12 text-muted">No records found</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>

                    @if (count($tasks) > 0)
                        <div class="pagination-custom">
                            {{ $tasks->appends($_GET)->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section> 

@endsection

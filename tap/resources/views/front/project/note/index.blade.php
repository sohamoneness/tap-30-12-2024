

@extends('front.layouts.appprofile')
@section('title', 'Project Notes')

@section('section')

    <div class="project-content">
        <div class="project-content-header">
            <div class="heading row1">
                <h3>Project Details</h3>
                <div class="cta-panel">
                    <form action="" class="ms-auto d-flex align-items-center">
                        <div class="search">
                            <input type="search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Search by title" />
                            <button type="submit">
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.4499 19.7425L16.5434 15.8365C17.7447 14.4745 18.4063 12.7201 18.4034 10.904C18.4034 8.90049 17.6234 7.01699 16.2069 5.60049C14.7904 4.18399 12.9069 3.40399 10.9039 3.40399C8.90094 3.40399 7.01694 4.18399 5.59994 5.59999C4.18294 7.01599 3.40344 8.89999 3.40344 10.9035C3.40344 12.907 4.18344 14.79 5.59994 16.2065C7.01644 17.623 8.89994 18.4035 10.9034 18.4035C12.7384 18.4035 14.4684 17.742 15.8359 16.543L19.7419 20.449C19.7883 20.4956 19.8433 20.5326 19.904 20.5578C19.9647 20.583 20.0297 20.596 20.0954 20.596C20.1611 20.596 20.2262 20.583 20.2869 20.5578C20.3475 20.5326 20.4026 20.4956 20.4489 20.449C20.5427 20.3552 20.5953 20.2281 20.5953 20.0955C20.5953 19.9629 20.5427 19.8358 20.4489 19.742L20.4499 19.7425ZM6.30694 15.5C5.07944 14.272 4.40344 12.64 4.40344 10.904C4.40344 9.16799 5.07944 7.53549 6.30694 6.30749C7.53494 5.07999 9.16694 4.40399 10.9034 4.40399C12.6399 4.40399 14.2719 5.07999 15.4999 6.30749C16.7274 7.53549 17.4039 9.16749 17.4039 10.904C17.4039 12.6405 16.7274 14.272 15.4999 15.5C14.2719 16.7275 12.6399 17.404 10.9039 17.404C9.16794 17.404 7.53444 16.7275 6.30694 15.5Z" fill="#262626"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <a href="" class="add-project btnn" data-bs-toggle="modal" data-bs-target="#noteModal">
                        <!-- <i class="fa-solid fa-circle-plus"></i>  -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Create new note
                    </a>
                </div>
            </div>
            <div class="heading row2">
                <div class="pro-content-header-left">
                    <ul class="list-unstyled p-0 m-0">
                        <li><a href="{{route('front.project.detail',$data->slug)}}" > Overview</a></li>
                        <li><a href="{{ route('front.project.task.list',$data->slug) }}"> Task List</a></li>
                        <li><a href="{{ route('front.project.task.kanban-board-task', $data->id) }}" class="">Task Kanban</a></li>
                        <li><a href="" class="active">Notes</a></li>
                        <li><a href="{{ route('front.project.file.index', $data->slug) }}" class="">Files</a></li>
                        <li><a href="{{ route('front.project.comment.index', $data->slug) }}" class="">Comments</a></li>
                        <li><a href="{{ route('front.project.feedback.index', $data->slug) }}" class="">Customer Feedback</a></li>
                    </ul>
                </div>
            </div>
          {{--<div class="header-btns">
            <!-- <a href="" class="kanban-btn btnn">kanban board</a> -->
            <a href="" class="add-project btnn" data-bs-toggle="modal" data-bs-target="#noteModal"
              ><i class="fa-solid fa-circle-plus"></i> create new note</a
            >
            
          </div>--}}
        </div>

        <div class="project-content-body">
          <!-- <div class="project-content-body-top">
            <div class="project-content-body-top-left">
            {{-- <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p> --}}
            </div>
            <div class="project-content-body-top-right project-content-body-top-right-list">
              
              <form action="">
               
                <div class="search">
                  <input type="search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Search by title" />
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div>
          </div> -->

          <div class="project-content-body-content">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                  <th>Created date</th>
                    <th>Title</th>
                    <th>Document</th>
                    <th>Action</th>
                  </tr>
                </thead>


                <tbody>
                @forelse ($note as $index => $item)
                    <tr class=" mb-3 task-row">
                        <td>
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}
                        </td>
                        <td class="task-title">
                            <p>
                               
                                {{ ucwords($item->title) }}
                                
                            </p>
                        </td>
                        <td class="download-link">
                            @if ($item->file)
                                <a href="{{ asset($item->file) }}" class="badge download-badge" download>
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
                        {{-- <td>
                            <a href="{{ route('front.project.task.detail', $item->slug) }}" class="text-success"><u><small>View task details</small></u></a>
                        </td> --}}
                       
                        <td class="text-center" width="120">
                                
                            <a type="button" class="badge" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                <!-- <i class="fas fa-edit"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8 13.3333H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <a href="{{ route('front.project.note.delete', $item->id) }}" class="badge" onclick="return confirm('Are you sure?')"> 
                                <!-- <i class="fas fa-trash"></i>  -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.6667 3.99999V13.3333C12.6667 13.6869 12.5262 14.0261 12.2762 14.2761C12.0261 14.5262 11.687 14.6667 11.3334 14.6667H4.66671C4.31309 14.6667 3.97395 14.5262 3.7239 14.2761C3.47385 14.0261 3.33337 13.6869 3.33337 13.3333V3.99999M5.33337 3.99999V2.66666C5.33337 2.31304 5.47385 1.9739 5.7239 1.72385C5.97395 1.4738 6.31309 1.33333 6.66671 1.33333H9.33337C9.687 1.33333 10.0261 1.4738 10.2762 1.72385C10.5262 1.9739 10.6667 2.31304 10.6667 2.66666V3.99999" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66663 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.33337 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                        
                    </div>
                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('front.project.note.update',$item->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group">
                                                        <input type="text" class="form-control" rows="4" name="title" id="description" placeholder="Your notes" value="{{ $item->title}}">
                                                </div><br><br><br>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" rows="4" name="description" id="description" placeholder="">{{ $item->description }}</textarea>
                                                </div>
                                                @error('description')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                        
                                                <div class="form-group">
                                                    <label class="control-label" for="doc">Upload Document (optional)</label>
                
                                                    <input type="file" class="form-control" rows="4" name="file" id="doc" value="{{asset($item->file)}}">
                                                    
                                                    @error('file')
                                                        <p class="small text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="add-btn-edit d-inline-block">Update</button>
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

          @if (count($note) > 0)
            <div class="pagination-custom">
                {{ $note->appends($_GET)->links() }}
            </div>
        @endif
        </div>
      </div>
      <div class="modal fade" id="noteModal" tabindex="-1"
        aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('front.project.note.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$data->id}}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                        <input type="text" class="form-control" rows="4" name="title" id="description" placeholder="Your notes" value="{{ old('title')}}">
                                </div><br><br><br>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" rows="4" name="description" id="description" placeholder="">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                        
                                <div class="form-group">
                                    <label class="control-label" for="doc">Upload Document (optional)</label>

                                    <input type="file" class="form-control" rows="4" name="file" id="doc" value="{{ old('file') }}">
                                    
                                    @error('file')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                    <button type="submit" class="add-btn-edit d-inline-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>


<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    
</script>

@endsection

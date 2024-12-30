

@extends('front.layouts.appprofile')
@section('title', 'Project Comment')

@section('section')

      <div class="project-content">
        <div class="project-content-header">
          <div class="heading row2 mt-0">
            <div class="pro-content-header-left">
              <ul class="list-unstyled p-0 m-0">
                  <li><a href="{{route('front.project.detail',$data->slug)}}" > Overview</a></li>
                  <li><a href="{{ route('front.project.task.list',$data->slug) }}"> Task List</a></li>
                  <li><a href="{{ route('front.project.task.kanban-board-task', $data->id) }}" class="">Task Kanban</a></li>
                  <li><a href="{{ route('front.project.note.index', $data->slug) }}" class="">Notes</a></li>
                  <li><a href="{{ route('front.project.file.index', $data->slug) }}" class="">Files</a></li>
                  <li><a href="{{ route('front.project.comment.index', $data->slug) }}" class="active">Comments</a></li>
                  <li><a href="{{ route('front.project.feedback.index', $data->slug) }}" class="">Customer Feedback</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="project-content-body comment-content-body">
          <div class="project-content-body-top">
            <div class="project-content-body-top-left">
              {{-- <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p> --}}
            </div>
            <div class="comment-card">
              <div class="comment-card-flex">
                <div class="comment-card-prof">
                  <img src="https://boughdigital.com/client/assets/images/avatar.jpg"/>
                </div>
                <div class="comment-card-section">
                  <form action="{{ route('front.project.comment.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$data->id}}">
                    <div class="comment-card-textarea">
                      <textarea id="w3review" name="comment" rows="3" cols="50" placeholder="Write a comment"></textarea>
                    </div>
                    <div class="comment-card-btns">
                        <div class="comment-card-btn">
                          <input type="file" id="upload" hidden/>
                          <label for="upload">
                            <!-- <iconify-icon icon="mdi:camera"></iconify-icon> Upload File -->
                            <i class="fas fa-paperclip"></i>
                          </label>
                        </div>

                        <div class="comment-card-btn">
                          <button type="submit" class="post-btn">
                            <!-- <iconify-icon icon="fa:paper-plane"></iconify-icon> Post Comment -->
                            <iconify-icon icon="ion:paper-plane-outline"></iconify-icon>
                          </button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>


              <div class="comment-card-view-section">
                @foreach ($comment as $item )
                    
                
                <div class="comment-card-view-el">
                  <div class="icon">
                    <img src="{{asset($item->user->image)}}" />
                  </div>

                  <div class="info">
                      <div class="name">
                        <h5>{{$item->user->first_name.' '.$item->user->last_name}}</h5>
                        <span class="datetime">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</span>
                      </div>
                      <div class="contentt">
                        <p>{{$item->comment}}</p>
                      </div>
                      <div class="reply-btn">
                        <button>
                          <!-- <iconify-icon icon="fa:mail-reply"></iconify-icon> -->
                          <iconify-icon icon="octicon:reply-16"></iconify-icon>
                          Reply
                        </button>
                      </div>
                  </div>
                </div>
                @endforeach
              </div>

            </div>
          </div>

         
        </div>
      </div>
     
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>


<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    
</script>

@endsection

@extends('front.layouts.appprofile')
@section('title', 'Advertisement')

@section('section')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
      /* background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      bottom: 23px;
      right: 28px;
      width: 100px; */
    }
    
    
    /* .chat-btn {
        border:none;
        background:none;
        color:#fff!important;
    }
    .chat-btn i {
        color: #95C800!important;
    }

    .chat-box {
    width: 300px;
    height: 100%;
    position: fixed;

    top: 0;
    right: -100%;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all .5s ease-in-out;
}
.chat-box .times-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    cursor: pointer;
    font-size: 18px;
}
.chat-box h4 {
    padding: 20px;
    margin-bottom: 10px;
    font-size: 18px;
    border-bottom: 1px solid #eee;
}
.chat-box form {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
}
.form-inputs {
    display: flex;

    justify-content: space-between;
    border: 1px solid #ddd;
    height: 60px;
}
.form-inputs textarea {
    outline: none;
    border: none;
    padding: 10px;
}

.form-inputs  button {
    border: none;
    height: 100%;
    width: 60px;
    color: #111;
    background: #eee;
    font-size: 20px;
}
#messageContent {
    overflow:scroll;
}
#messageContent ul li.auth-user {
    background: #719604;
    max-width: 180px;
    margin-left:auto;
    margin-right: 10px;
    margin-bottom: 10px;
    padding: 10px;
    color: #fff;
    border-radius: 10px 10px 10px 0px;
    text-align:right;
    font-size: 14px;
}
#messageContent ul li.not-auth {
    background: #95C800;
    max-width: 180px;
    margin-left: 10px;
    margin-bottom: 10px;
    padding: 10px;
    color: #fff;
    border-radius: 10px 10px 0px 10px;
    text-align:right;
    font-size: 14px;
}
#messageContent ul li.auth-user span.chat-date {
    display: block;
    text-align: right;
}
.go-to-pro {
    padding:6px!important;
} */
    </style>

<div class="project-content">
        
<div class="project-content-header">
        
          <div class="header-btns w-100 d-flex justify-content-end py-3">
            <!-- <a href="{{ route('front.project.kanban-board') }}" class="kanban-btn btnn">kanban board</a> -->
            <a href="{{ route('front.advertisement.show') }}" class="add-project btnn"
              ><i class="fa-solid fa-angle-left"></i> Back to all applicants</a
            >
          </div>
        </div>
        <div class="project-content-body">
          <div class="project-content-body-top">
            <div class="project-content-body-top-left">
              <span> Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </span>
            </div>
            <!-- <div class="project-content-body-top-right">
              <div class="export">
                <a href="" class="btnn export-btn"
                  ><i class="fa-solid fa-file-csv"></i> export as esv</a
                >
              </div>
              <form action="">
                <div class="select">
                  <select name="" id="">
                    <option value="">all</option>
                    <option value="">icebox</option>
                    <option value="">todo</option>
                    <option value="">in progress</option>
                  </select>
                </div>
                <div class="search">
                  <input type="text" placeholder="Search" />
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div> -->
          </div>
    <style>
        .approval-body td {
            width: initial!important;
        }
    </style>
          <div class="project-content-body-content approval-body">
            <div class="table-responsive">
              <table class="table table-bordered mb-0">
                <thead>
                  <tr>
                  <th>SR</th>
                                <th>Title</th>
                                <th>Client Name</th>
                                <th>Proposal Status</th>
                                <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                 <td>
                                    {{-- {{ $index + $data->firstItem() }}  --}}
                                    
                                    {{ $item->job_id}}</td>

                                <td>
                                    {{$item->job->title}}
                                </td>
                                <td>
                                    {{ $item->job->user->first_name.' '.$item->job->user->last_name }}
                                </td>
                                @if($item->status==1)
                                <td>
                                    Approved
                                </td>
                                @elseif($item->status==2)
                                <td>
                                    In review
                                </td>
                                @else
                                <td>
                                    Rejected
                                </td>
                                @endif
                                
                                @if($item->is_project == 0 && $item->status ==1)
                                <td class="text-center" width="120">
                                    {{-- <a href="{{ route('front.advertisement.detail', $item->slug) }}" class="badge bg-dark"> <i class="fas fa-eye"></i> </a> --}}
                                    <form action="{{route('front.advertisement.proposal.project.store')}}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="title" value="{{$item->job->title}}">
                                        <input type="hidden" name="job_id" value="{{$item->job->id}}">
                                        <input type="hidden" name="deadline" value="{{$item->job->deadline}}">
                                        <input type="hidden" name="short_desc" value="{{$item->job->short_desc}}">
                                        <input type="hidden" name="client_id" value="{{$item->job->created_by}}">
                                        <button type="submit" class="badge bg-dark">Add to your project board</button>
                                        
                                    </form>
                                </td>
                                
                                


                                @elseif($item->is_project ==1 )
                                <td><a type="button" href="{{route('front.project.detail',$item->job->slug)}}" class="badge bg-dark go-to-pro">Go to project</a>

                                <button class="open-button chat-btn badge bg-dark" onclick="openForm(<?php echo $item->job_id; ?>)"><i class='fas fa-comment' style='font-size:14px;color:red'></i></button>
                                </td>
                                @else

                               
                                <td></td>
                                @endif
                             
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

          
        </div>


        @if (count($data) > 0)
                <div class="pagination-custom">
                    {{ $data->appends($_GET)->links() }}
                </div>
                @endif

      </div>


<section class=" ">
    <div class="container">
       

        <!-- <div class="chat-popup" id="myForm">
            <form id="addToMessageForm" class="form-container">
              <h4>Chat</h4>
          
           

              <div id="messageContent"> 
                <ul>

                </ul>
              </div>
              <textarea placeholder="Type message.." name="msg" id="msg" required></textarea>

              <input type="hidden" name="channel_id" id="channel_id">
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <button type="submit" class="btn">Send 1</button>
              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>  -->

        
        <div class="chat-box" id="myForm">
      <div class="times-close">
        <i class="fa-solid fa-xmark"></i>
      </div>

      <form id="addToMessageForm" class="form-container">
        <h4>Chat</h4>

        <div id="messageContent">
          <ul></ul>
        </div>
       

        <div class="form-inputs">
          <input type="hidden" name="channel_id" id="channel_id" />
        <input
          type="hidden"
          name="_token"
          id="csrf-token"
          value="{{ Session::token() }}"
        />
         <textarea placeholder="Type message.." name="msg" id="msg" required></textarea>
        <button type="submit" ><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </form>
    </div>



    </div>
</section>

@endsection
@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    
    <script>
      const chatBox = document.querySelector('.chat-box')
      const timesClose = document.querySelector('.times-close')

      timesClose.addEventListener('click', (e) => {
        chatBox.style.right = '-100%'
      })

      window.addEventListener('mouseup', (e) => {
        if(!chatBox.contains(e.target)) {
            chatBox.style.right = '-100%'
        }
      })
    </script>
<script>
    
function openForm(jobID) {
    //alert(jobID);
    
    var url = '{{route('front.advertisement.proposal.channel.store')}}';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token : "{{csrf_token()}}",
                            job_id : jobID,
                        },
                        success:function(response){
                            //alert(response.project);
                            $("#channel_id").val(response.project);
                            var myMsgs = ``;
                            var authUser =  '<?php echo auth()->guard('web')->user()->id;?>';
                            $.each(response.message, function(key,val) {   
                                 if(val.sender_id == authUser){
                                    myMsgs += `<li class="auth-user">`+val.message+` <span class="chat-date">22nd Jan, 2023. 8:30 am</span></li>`;
                                 } else{
                                        myMsgs += `<li class="not-auth">`+val.message+`</li>`;
                                 }                          
                            });
                            $("#messageContent ul").html(myMsgs);
                            document.getElementById("myForm").style.right = "0";
                            $('#msg').focus();
                        },
                        error: function(response){
                            toastFire("warning", response.message);
                        }
                    });
  
}
   // add to cart ajax
   $('#addToMessageForm').on('submit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = '{{route('front.advertisement.proposal.message.store')}}';
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                success: function(result) {
                    const message = `<li class="auth-user">${result.msg} <span class="chat-date">22nd Jan, 2023. 8:30 am</span></li>`;
                    $('#messageContent ul').append(message);
                    $("#msg").val('');
                },
            });

            
        });
        
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
@endsection

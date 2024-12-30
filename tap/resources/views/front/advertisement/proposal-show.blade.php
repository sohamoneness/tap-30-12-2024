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
    
    
    .chat-btn {
        border:none;
        background:none;
        color:#fff!important;
        /* background: #111;
        padding: 3px;
        color: #fff; */
    }
    .chat-btn i {
        color: #95C800!important;
    }

    .chat-box {
    width: 300px;
    height: 100%;
    position: fixed;
    overflow:scroll;
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
/* .chat-box form input {
    border: none;
    padding: 10px;
    outline: none;
} */
.form-inputs  button {
    border: none;
    height: 100%;
    width: 60px;
    color: #111;
    background: #eee;
    font-size: 20px;
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
    </style>
<section class="edit-sec ">
    <div class="container">
        <div class="row my-3 justify-content-between">
            <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ route('front.advertisement.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
            <p>{{$content->title}}</p>
            <div class="col-md-3">
                <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p>
            </div>
            <div class="col-md-9">
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-12">
                <div class="table-responsive table-tabs">
                    <table class="table projectTable">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Writer Name</th>
                                <th>Writer Email</th>
                                <th>Writer Mobile</th>
                                <th>Writer Address</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>
                                    
                                    {{-- {{ $index + $data->firstItem() }} --}}
                                      
                                    {{ $item->id }}
                                
                                </td>
                               
                                
                                <td>
                                    {{ $item->user->first_name.' '.$item->user->last_name }}
                                </td>
                                <td>
                                    {{$item->user->email}}
                                </td>
                                <td>
                                    {{$item->user->mobile}}
                                </td>
                                <td>
                                    {{$item->user->address}}
                                </td>
                                <td>
                                    {{-- <span class="badge text-success" data-toggle="tooltip" title="{{ $item->statusDetail->icon ?? ''}}">{!! $item->statusDetail->icon ?? ''.' '.ucwords($item->status) !!}</span> --}}
                                    <select onchange="changeProjectAndTaskStatus(`{{route('front.advertisement.proposal.updateStatus')}}`,this,'{{$item->id}}')" name="status" id="status" data-original="{{$item->status}}" class="form-control">
                                        <option value="" selected disabled>Change Status</option>
                                        <option value="1" {{$item->status == '1' ? 'selected' : ''}}>Approve</option>
                                        <option value="0" {{$item->status == '0' ? 'selected' : ''}}>Reject</option>
                                         <option value="3" {{$item->status == '3' ? 'selected' : ''}}>Shortlist</option>
                                    </select>
                                    <div class="input-group mb-3 spare_input{{$item->id}}" style="display: none;">
                                        <input type="text" name="spare{{$item->id}}" class="form-control" placeholder="Name...">
                                        <button class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-check"></i></button>
                                        <span class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-times"></i></span>
                                    </div>
                                </td>
                                <td class="text-center" width="120">
                                    {{-- <a href="{{ route('front.advertisement.detail', $item->slug) }}" class="badge bg-dark"> <i class="fas fa-eye"></i> </a> --}}

                                    <a href="{{ route('front.advertisement.proposal.details', $item->id) }}" class="badge bg-dark"> <i class="fas fa-eye"></i></a>
                                   
                                   
                                   <?php $projectID = Request::segment(5); ?>
                                    <button class="open-button chat-btn badge bg-dark" onclick="openForm('<?php echo $projectID ;?>','<?php echo $item->user->id;?>')"><i class='fas fa-comment' style='font-size:14px;color:red'></i></button>
                                
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

                @if (count($data) > 0)
                <div class="pagination-custom">
                    {{ $data->appends($_GET)->links() }}
                </div>
                @endif
            </div>
        </div>

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
        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
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
        $(function () {
        $(".open-button").click(function () {
            console.log('dd')
          $("html, body").animate(
            {
              scrollTop:
                $("#myForm").offset().top + $("#myForm")[0].scrollHeight,
            },
            2000
          );
          return false;
        });
      });
    </script>
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
function openForm(jobID,initiatedBy) {
    //alert(jobID);
    var url = '{{route('front.advertisement.proposal.channel.store.publisher')}}';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token : "{{csrf_token()}}",
                            job_id : jobID,
                            initiated_by: initiatedBy, 
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


@extends('front.layouts.appprofile')
@section('title', 'Requested Articles')

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
                <a href="{{ route('front.portfolio.private-articles.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
            <div class="col-md-3">
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
                                <th>Publisher</th>
                                <th>Atricle</th>
                                <th>Publish Date</th>
                                <th>Comment </th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($final_array as $index => $item)
                            <tr>
                              <td> {{$item['publisher_name'] }} </td>
                              <td>{{$item['article_name'] }} </td>
                               <td> {{    date("d-m-Y", strtotime($item['publish_date']))  }}   </td>
                               <td> {{$item['comment'] }} </td>
                               <td>  
                                <select onchange="changeProjectAndTaskStatus(`{{route('front.portfolio.private-articles.updateStatus')}}`,this,'{{$item['id']}}')" name="status" id="status" data-original="{{$item['status']}}" class="form-control">
                                    <option value="" selected disabled>Change Status</option>
                                    <option value="0" {{$item['status'] == '0' ? 'selected' : ''}}>	In review</option>
                                    <option value="1" {{$item['status'] == '1' ? 'selected' : ''}}>Approve</option>
                                    <option value="2" {{$item['status'] == '2' ? 'selected' : ''}}>reject</option>
                              </select>
                          </td>
                               <td>  </td>
                                
                          
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


</script>
@endsection


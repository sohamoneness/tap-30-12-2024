@extends('front.layouts.appprofile')
@section('title', 'Project')
 
@section('section')
<style>
        /* body,
html {
  width: 100%;
  overflow-x: hidden;
  font-family: "Montserrat", sans-serif !important;
} */
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



/* a {
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
.kanban-flex {
    justify-content: flex-end!important;
    width: 100%;
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
            <h3>
                <a href="{{ route('front.project.index') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i></a>
                Project Details
            </h3>
        </div>
        <div class="pro-content-header-left">
            <!-- <h3 class="mb-0">projects: </h3> -->
            <ul class="list-unstyled p-0 m-0">
                <!--  -->
            </ul>
          </div>
          <div class="header-btns">
            
            <a href="{{ route('front.project.create') }}" class="add-project btnn"
              ><i class="fa-solid fa-circle-plus"></i> create a project</a
            >
          </div>
        </div>

        <div class="project-content-body">
          <div class="project-content-body-top">
            
            <div class="project-content-body-top-right kanban-flex">
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
          </div>
</section>
 <!-- <form action="" method="GET">
    <div  class="input__large d-flex align-items-center justify-content-end">
        <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="form-control w-25 ms-2" placeholder="Search by title">
        <select name="search_deadline" class="form-control w-25 ms-2">
            <option value="" selected>All</option>
            @foreach ($deadline as $key=>$val)
                <option value="{{ $val }}" {{request()->input('search_deadline') == $val ? 'selected' : ''}}>{{ $key }}</option>
            @endforeach
        </select>
        <div class="btn-group export__search ms-2">
            <button class="btn btn-success btn-search"><i class="fa fa-search"></i></button>
            <a href="{{route('front.project.kanban-board')}}" class="btn btn-danger btn-search mx-sm-2"><i class="fa fa-times"></i></a>

        </div>
    </div>
</form> -->
</br>
<section class="edit-sec ">
        <div class="container">
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
    var url = '{{route('front.project.updateStatus')}}';
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

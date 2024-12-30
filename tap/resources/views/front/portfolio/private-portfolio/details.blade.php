@extends('front.layouts.app')
@section('title', 'Article detail')

@section('section')
<section class="private-port py-5 mt-5">
      <div class="container">
        <div class="row">
        <div class="col-12 text-end">
                 <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.private-articles.index') }}"><i class="fa fa-chevron-left me-1"></i>Back</a>
            </div>
        </div>
        <div class="row g-4 mt-4">
          <div class="col-12 col-md-3">
            <div class="blog-left">
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5>total words: <span>{{ $data->total_words}}</span> </h5>
                  
                </div>
              </div>
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5>budget: <span>{{ $data->budget}} </span></h5>
                  
                </div>
              </div>
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5>primary keyword: </h5>
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">{{ $data->primary_keyword}}</a></li>
                    
                  </ul>
                </div>
              </div>
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5>secondary keyword: </h5>
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">{{ $data->secondary_keywords}}</a></li>
                    
                  </ul>
                </div>
              </div>
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5> Seo Writing Tool Used : </h5>
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">{{ $data->seo_tool}}</a></li>
                    
                  </ul>
                </div>
              </div>
              <div class="blog-left-content">
                <div class="blog-left-el">
                  <h5> Must be published before: </h5>
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">{{ date('j F Y', strtotime($data->published_by)) }}</a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-9">
            <div class="blog-right">
              <div class="blog-right-content">
                <div class="blog-right-el blog-right-title">
                  <h2>{{ $data->title}}</h2>
                </div>
                <div class="blog-right-el blog-right-img">
                @if ($data->image != '')
                    <img src="{{ asset($data->image) }}" class="img-fluid">
                @endif
                </div>
                <div class="blog-right-el blog-right-date-content">
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">
               
                    <i class="fa-solid fa-clock"></i>
                      <span>Article Created On {{ date('j F Y g:i A', strtotime($data->created_at)) }}</span>
                    </a></li>

                    <li><a href="">
                    <i class="fa-solid fa-list"></i>
                      <span>{{ $data->category}}</span>
                    </a></li>
                  </ul>
                </div>
                <div class="blog-right-el blog-right-short-desc">
                  <h5 class="mb-0">{{ $data->short_desc}} </h5>
                </div>
                <div class="blog-right-el blog-right-desc">
                  <p>{{ $data->actual_article}}  </p>
                </div>
                <?php if(auth()->user()->type == '3'){ ?>
                    <button type="button" class="btnn-cta" data-bs-toggle="modal" data-bs-target="#exampleModal">request article</button>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


   


    <div class="modal fade cta-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request Article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="jobApplyForm" class="form-container" method="POST">
                    @csrf
                <input type="hidden"  name="article_id" value="{{$data->id}}">
                <input type="hidden"  name="publisher_id" value="{{auth()->user()->id}}">
              <div class="form-group mb-2">
                <span for="">Will the writer be credited with the work under an author bio?</span>
                <div class="radio-left mt-2">
                  <input type="radio" class="yes" id="yes" name="under_auther_bio" value="1"> <label class="radio-span" for="yes">Yes</label> 
                 <input type="radio" id="no" class="no" name="under_auther_bio" value="0"> <label class="radio-span" for="no">No</label>
                </div>
                
                
              </div>
              <div class="form-group mb-4">
                <label for="" class="mb-2">When will you publish the content?</label>
                <input type="date" class="form-control" name="publish_date">
              </div>
              <div class="form-group mb-4">
                <label for="" class="mb-3">Comment</label>
                <textarea name="comment" id="" cols="30" rows="6" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="course-deails-btn" id=""> Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});

$('#jobApplyForm').on('submit', function(e) {
               e.preventDefault();
              var data = $(this).serialize();
              var url = '{{ route('front.portfolio.private-articles.request') }}';
             // alert(url);
              $.ajax({
                  url: url,
                  type: "POST",
                  data: data,
                  success: function(result) {
                    if(result.success){
                        toastFire("success", result.success);
                        $('#exampleModal').modal('hide');
                    }else{
                        toastFire("error", result.failure);

                    }
                  },
              });
    
});
   
</script>
@endsection

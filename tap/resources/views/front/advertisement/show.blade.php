@extends('front.layouts.appprofile')
@section('title', 'Content Advertisement')
@section('section')

<style>
   .dashboard-featured-flex {
      display: flex;
      align-items: center;
      justify-content: space-between;
   }
</style>

<div class="dashboard-content">
   <div class="row">
      <div class="col-12 col-lg-3 col-md-3 mt-3">
         <div class="jobs-filter-content">
            <form action="{{ route('front.advertisement.show') }}">
               <div class="jobs-filter-heading">
                  <h6>filter</h6>
                  <a href="{{ route('front.advertisement.show') }}">
                  <span class="clear-filter"><small>Clear filter</small></span>
                  </a>
               </div>
               <div class="jobs-filter-keywords">
                  <input type="text" name="keyword" placeholder="Enter keywords" class="form-control" value="" />
               </div>
               <div class="jobs-filter-checkbox job-filter-location">
                  <h4>Budget</h4>
               <div class="price-range-block">
                
                	<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                
                	<div style="margin:30px auto">
                	  <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" name="min_price" class="price-range-field" />
                	  <input type="number" min=0 max="50000" oninput="validity.valid||(value='50000');" id="max_price" name="max_price" class="price-range-field" />
                	</div>
                </div>
               </div>
               <div class="jobs-filter-checkbox job-filter-source">
                  <h4>Category</h4>
                  <select name="search_status" class="form-control">
                     <option value="" selected>All</option>
                     @foreach ($status as $s)
                     <option value="{{ $s->id }}" {{request()->input('search_status') == $s->id ? 'selected' : ''}}>{{ $s->title }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="job-filter-save">
                  <input type="hidden" name="filter" value="on">
                  <button type="submit" class="btn button">Search</button>
               </div>
            </form>
         </div>
      </div>
      <div class="col-12 col-lg-9 col-md-9">
         <div class="dashboard-featured mt-3">
            <div class="dashboard-featured-flex">
               <div class="top-info">
                  @if (!request()->input('keyword')|| !request()->input('payment')||!request()->input('search_status'))
                  <span>Showing all Advertisement</span>
                  @else
                  @if ($data->count() > 0)
                      <span>Results found.</span>
                  @else
                      <span>No Results found. Please try again with a different filter.</span>
                  @endif
              @endif
               </div>
               <a href="{{ route('front.advertisement.proposal.approval.show') }}" class="saveBTN d-inline-block">
                  View Proposal
               </a>
            </div>
            <div class="row mt-2 g-2">
                @foreach ($data as $index => $item)
                    <div class="col-12 col-lg-6 col-md-12">
                        <div class="recommended-writers-content">
                            @if ($item->budget == '0')
                                        <div class="featured-jobs-badge">
                                            <span>Paid</span>
                                        </div>
                            @endif
                            <div class="content-top">
                                <div class="content-top-info">
                                 <a href="{{ route('front.advertisement.detailPage', $item->slug) }}"><h4>{{ $item->title }}</h4></a>
                                <span>{{$item->primary_keyword}}  </span> </br>
                                <?php if($item->budget == '0'){ ?>
                                    <span> Budget Amount: {{ $item->budget_amount }}  </span>
                                    <?php  } ?>
                                <p class="small text-muted mt-3 short-desc">{{$item->short_desc}}</p>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="content-btm">
                                <a href="{{ route('front.advertisement.detailPage', $item->slug) }}" class="add-btn-edit d-inline-block">
                                Submit Proposal
                                <img src="assets/img/arrow-right-freelance.png" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="row justify-content-end mt-4">
               <div class="col-12 text-end pagination-custom">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="dashboard-footer">
   <div class="row">
      <div class="col-12 col-lg-6 col-md-6 mb-2 text-center text-md-start">
         <p class="mb-0">@Copyright  2022</p>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>

</section>
@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 50000,
		values: [0, 50000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  //$("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

});
   
</script>
@endsection
@extends('front.layouts.appprofile')
@section('title', ' Job Saved Filter(s)')
@section('section')

	<style>
	  .edit-basic-detail ul {
	    display: flex;
	    align-items:center;
	    justify-content: flex-start;
	    flex-wrap: wrap;
	  }
	  .edit-basic-detail ul li a {
	  display: inline-block;
	    border: 1px solid #ccc;
	    padding: 10px;
	    margin: 6px;
	    text-transform: capitalize;
	    border-radius: 5px;
	    font-weight: 500;
	    color: #111;
	  }
	   .edit-basic-detail ul li a:hover {
	    background: #95C800;
	    color:#fff;
	    border-color: #95C800;
	   }
	</style>

    <section class="edit-sec edit-basic-detail">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-12 col-md-6"><h4 class="mb-0"> Saved keywords </h4></div>
                <div class="col-12 col-md-6 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.job.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
             
                <ul>
                	@foreach($search as $val)
                <li> <a href="javascript:void(0)">{{$val->keyword}}</a>  </li>
                 @endforeach
                </ul>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush

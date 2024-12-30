@extends('front.layouts.appprofile')
@section('title', ' Content Advertisement')
@section('section')
    <section class="edit-sec edit-basic-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.advertisement.show') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 col-md-12 mb-3 mb-lg-0">
                    <div class="course-details-left">
                        <div class="theiaStickySidebar">
                            <div class="course-details-left-content">
                                <div class="course-details-main-info">
                                    <h2>{{ $data->title }}</h2>
                                    <p class="badge tag-badge">{{$data->advertisement_category->title}}</p>
                                    <div class="jobsearch-jobDescriptionText">

                                        @if($data->short_desc)
                                            <p><b>Description</b></p>
                                            <ul>{!! $data->short_desc !!} </ul>
                                        @endif
                                        
                                        <p><b>Type </b></p>
                                        @if ($data->budget == '0')
                                        <div class="featured-jobs-badge">
                                            <span>Paid</span>
                                        </div>
                                        @endif
                                        @if ($data->budget == '1')
                                        <div class="featured-jobs-badge">
                                            <span>Free</span>
                                        </div>
                                       @endif
                                       <?php if($data->budget == '0'){ ?>
                                        <span> Budget Amount: {{ $data->budget_amount }}  </span>
                                        <?php  } ?>

                                        <p><b>Keywords</b></p>
                                        <ul>
                                           <li> Primary keyword: {{ $data->primary_keyword }} </li>
                                           <li> Secondary keyword: {{ $data->secondary_keyword  }}</li>
                                        </ul>
                                        
                                        @if($data->words_required != '')
                                            <p><b>Words Required: {{ $data->words_required }}</b></p>
                                        @endif

                                     

                                        @if($data->writer_type)
                                            <p><b>Experience Required: {{ $data->writer_type }}</b></p>
                                        @endif
                                        @if($data->client_name != '' && $data->client_website)
                                        <p><b>Client Name: </b> ({{$data->client_name}})</p>
                                        @endif
                                        <p><b>Client Website: </b> <a href="{{$data->client_website}}">{{$data->client_website}}</a></p>
                                        
                                        <p><b>Deadline:  {{ date('Y-m-d', strtotime($data->deadline))  }} </b></p>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
                <div class="col-12 col-lg-4 col-md-12 mb-3 mb-lg-0 ">
                    <div class="sticky-top apply__job mt-4">
                        @if (!empty($jobApplied))
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>

                                <h5 class="text-center mb-2">Thanks for your proposal</h5>

                                <p class="text-muted small" style="font-size: 13px;line-height: 20px;">You have successfully applied. Please stay put till you hear from us.</p>
                            </div>
                        </div> 
                         @else 
                                <a type="button" class="saveBTN d-inline-block" id="saveBtn" data-bs-toggle="modal" data-bs-target="#yourModal{{$data->id}}">Submit proposal</a>
                         @endif 
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <div class="modal fade" id="yourModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header flex-column align-items-start">
                    <div class="d-flex align-items-center w-100">
                        <h5 class="modal-title" id="exampleModalLabel">{{$data->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <form action="{{route('front.advertisement.proposal.store')}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{$data->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea type="text" class="form-control" rows="4" name="cover" id="cover" placeholder="Cover Letter">{{ old('cover') }}</textarea>
                            @error('cover')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="saveBTN d-inline-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

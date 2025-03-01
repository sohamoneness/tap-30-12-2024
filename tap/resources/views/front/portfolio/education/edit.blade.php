@extends('front.layouts.appprofile')

@section('title', 'Manage Portfolio')
@section('section')
<section class="edit-sec edit-basic-detail">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.education.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                    <h2>Update  Education Details</h2>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="edit-basic-detail-content-wrap">
                    
                        <h3>Update  Education Details</h3>
                        <form action="{{ route('front.portfolio.education.update') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            
                                <div class="form-group">
                                    <label class="control-label" for="degree">Degree <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('degree') is-invalid @enderror" type="text" name="degree"
                                        id="degree" value="{{ old('degree',$education->degree) }}" />
                                        <input type="hidden" name="id" value="{{$education->id }}">
                                    @error('degree')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="college_name">Institution Name <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('college_name') is-invalid @enderror" type="text" name="college_name"
                                        id="college_name" value="{{ old('college_name',$education->college_name) }}" />
                                    @error('college_name')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="year_from">From <span class="m-l-5 text-danger">
                                        *</span></label>
                                    <input class="form-control @error('year_from') is-invalid @enderror" type="date" name="year_from"
                                        id="year_from" value="{{ old('year_from',$education->year_from) }}" />
                                    @error('degree')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="btn-group statusButton" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="is_present" value="yes" id="btnradio1" {{old('year_from', $education->year_to) == '' ? 'checked' : ''}}>
                                    <label class="btn btn-outline-primary" for="btnradio1">Present</label>
                                  
                                    <input type="radio" class="btn-check" name="is_present" value="no" id="btnradio3" {{old('year_from', $education->year_to) != '' ? 'checked' : ''}}>
                                    <label class="btn btn-outline-primary" for="btnradio3">Past</label>
                                </div>
                                <div class="form-group" style="display: {{old('year_from',$education->year_to) == '' ? 'none' : 'block'}}">
                                    <label class="control-label" for="year_to">To <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('year_to') is-invalid @enderror" type="date" name="year_to"
                                        id="year_to" value="{{ old('year_to',$education->year_to) }}" />
                                    @error('year_to')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="score">Percentage (optional)</label>
                                    <input class="form-control @error('score') is-invalid @enderror" type="text" name="score"
                                        id="score" value="{{ old('score',$education->score) }}" />
                                    @error('score')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email_id">Email (optional)</label>
                                    <input class="form-control @error('email_id') is-invalid @enderror" type="text" name="email_id"
                                        id="email_id" value="{{ old('email_id',$education->email_id) }}" />
                                    @error('email_id')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="link">Url (optional)</label>
                                    <input class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                                        id="link" value="{{ old('link',$education->link) }}" />
                                    @error('link')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="short_desc">Short Description (optional)<p class="m-l-5 text-danger"><small>(Max 200 characters)</small></p></label>
                                    <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc',$education->short_desc) }}</textarea>
                                    @error('short_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="long_desc">Long Description (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="long_desc" id="long_desc">{{ old('long_desc',$education->long_desc) }}</textarea>
                                    @error('long_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="position">Position(Like school,college,university,mark it 1 or 2 or 3) <span class="m-l-5 text-danger">
                                        *</span></label>
                                    <input type="text" class="form-control"  name="position" id="position" value="{{ old('position',$education->position) }}">
                                    @error('position')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit">
                                    <!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->
                                    Update
                                    </button>
                                    <!-- <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.education.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a> -->
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@section('script')    
    <script>
        $('input[name="is_present"]').on('click', function(){
            if($('input[name="is_present"]:checked').val() == 'yes'){
                $(this).parent().next().hide();
                $(this).parent().next().children().eq(1).val('');
            }
            else{
                $(this).parent().next().show();
            }
        })
    </script>
@endsection
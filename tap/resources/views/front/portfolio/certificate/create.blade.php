@extends('front.layouts.appprofile')

@section('title', 'Manage Portfolio')
@section('section')
<section class="edit-sec edit-basic-detail">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.certification.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                    <h2>Add  Certificate Details</h2>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="edit-basic-detail-content-wrap">
                    
                        <h3>Add  Certificate Details</h3>
                        <form action="{{ route('front.portfolio.certification.store') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            
                                <div class="form-group">
                                    <label class="control-label" for="certificate_title">Certificate Name <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('certificate_title') is-invalid @enderror" type="text" name="certificate_title"
                                        id="certificate_title" value="{{ old('certificate_title') }}" />
                                    @error('certificate_title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="certificate_type">Certificate Type <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('certificate_type') is-invalid @enderror" type="text" name="certificate_type"
                                        id="certificate_type" placeholder="eg: Business analyst,Marketing" value="{{ old('certificate_type') }}" />
                                        <input type="hidden"  name="id" value="{{Auth::guard('web')->user()->id }}">
                                    @error('certificate_type')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="link">Url (optional)</label>
                                    <input class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                                        id="link" placeholder="eg: https://www.google.com/" value="{{ old('link') }}" />
                                    @error('link')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="short_desc">Short Description (optional)<p class="m-l-5 text-danger"><small>(Max 200 characters)</small></p></label>
                                    <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc') }}</textarea>
                                    @error('short_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="long_desc">Long Description (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="long_desc" id="long_desc">{{ old('long_desc') }}</textarea>
                                    @error('long_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="file">file <span class="m-l-5 text-danger">
                                        *</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                    <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"/>
                                    @error('file')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit">
                                    <!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->
                                    Submit
                                    </button>
                                    <!-- <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.certification.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a> -->
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

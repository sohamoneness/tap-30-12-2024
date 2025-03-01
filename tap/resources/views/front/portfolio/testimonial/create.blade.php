@extends('front.layouts.appprofile')

@section('title', 'Manage Portfolio')
@section('section')
<section class="edit-sec edit-basic-detail">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                text-align: right;">
                <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.testimonial.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                </div>
                    <h2>Add  Testimonial Details</h2>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="edit-basic-detail-content-wrap">
                    
                        <h3>Add Testimonial Details</h3>
                        <form action="{{ route('front.portfolio.testimonial.store') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            
                                <div class="form-group">
                                    <label class="control-label" for="client_name">Client Name <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('client_name') is-invalid @enderror" type="text" name="client_name"
                                        id="client_name" value="{{ old('client_name') }}" />
                                    @error('client_name')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="occupation">Occupation <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('occupation') is-invalid @enderror" type="text" name="occupation"
                                        id="occupation" value="{{ old('occupation') }}" />
                                        <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id }}">
                                    @error('occupation')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="phone_number">Contact (optional)</label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number"
                                        id="phone_number" value="{{ old('phone_number') }}" />
                                    @error('phone_number')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email_id">Email (optional)</label>
                                    <input class="form-control @error('email_id') is-invalid @enderror" type="text" name="email_id"
                                        id="email_id" value="{{ old('email_id') }}" />
                                    @error('email_id')
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
                                    <label class="control-label" for="short_testimonial">Short Description (optional) <p class="m-l-5 text-danger"><small>(Max 200 characters)</small></p></label>
                                    <textarea type="text" class="form-control" rows="4" name="short_testimonial" id="short_testimonial">{{ old('short_testimonial') }}</textarea>
                                    @error('short_testimonial')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="long_testimonial">Long Description (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="long_testimonial" id="long_testimonial">{{ old('long_testimonial') }}</textarea>
                                    @error('long_testimonial')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="image">Image <span class="m-l-5 text-danger">
                                        *</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit">
                                    <!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->
                                    Submit
                                    </button>
                                    <!-- <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.testimonial.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a> -->
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

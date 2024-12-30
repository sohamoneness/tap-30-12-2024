@extends('front.layouts.appprofile')

@section('title', 'Manage Private Articles')
@section('section')
<section class="edit-sec edit-basic-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.private-articles.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                    <h2>Add Private  Article</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto edit-basic-detail-content-wrap">
                    <div class="tile">
                    <span class="top-form-btn">
                        <form action="{{ route('front.portfolio.private-articles.store') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="category">Category <span class="m-l-5 text-danger">
                                            *</span></label>
                                            <select class="form-control" name="category">
                                                <option value="" hidden selected>Select</option>
                                                @foreach ($category as $index => $item)
                                                    <option value="{{ $item->title }}" {{old('category') == $item->title ? 'selected' : ''}} >{{ $item->title }}</option>
                                                @endforeach
                                        </select>
                                    @error('category')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="title">Title <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                        id="title" value="{{ old('title') }}" />
                                        <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id }}">
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>

                                <div class="form-group">
                                    <label class="control-label" for="title">Total Words <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="number" name="total_words"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="title">Budget<span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="number" name="budget"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="title">Primary Keyword<span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="primary_keyword"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="title">Secondary Keywords(Comma separated values) <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="secondary_keywords"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>

                                <div class="form-group">
                                    <label class="control-label" for="title">Seo Writing Tool Used <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="seo_tool"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                     


                                <div class="form-group">
                                        <label class="control-label" for="deadline">Published By <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control @error('deadline') is-invalid @enderror" type="datetime-local" value="{{date('Y-m-d H:i',strtotime(old('deadline') ?? date('Y-m-d')))}}" id="deadline" name="published_by"/>
                                        @error('deadline')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <br>
                                <div class="form-group">
                                    <label class="control-label" for="short_desc">Short Description<span class="m-l-5 text-danger">
                                        *</span><p class="m-l-5 text-danger"><small>(Max 200 characters)</small></p></label>
                                    <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc') }}</textarea>
                                    @error('short_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="actual_article">Actual Article<span class="m-l-5 text-danger">
                                        *</span></label>
                                    <textarea type="text" class="form-control" rows="4" name="actual_article" id="short_desc">{{ old('actual_article') }}</textarea>
                                    @error('short_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="title">No of Images <span class="m-l-5 text-danger">
                                            *</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="number" name="no_of_images"
                                        id="title" value="{{ old('title') }}" />
                                        
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label" for="image">Primary Image <span class="m-l-5 text-danger">
                                        *</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div><br>
                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>

                                <a href="{{ route('front.portfolio.portfolio.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa fa-chevron-left me-2"></i>Back</a>

                                {{-- &nbsp;&nbsp;&nbsp; --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

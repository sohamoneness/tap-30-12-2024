@extends('front.layouts.appprofile')
@section('title', 'Manage Portfolio')

@section('section')
<section class="edit-sec edit-basic-detail">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center top-heading">
                <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.portfolio.portfolio.index') }}"><i class="fa fa-chevron-left me-1"></i>Back</a>
                    </div>
                <h2>Update  Portfolio Details</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto edit-basic-detail-content-wrap">
                <div class="tile">
                <span class="top-form-btn">
                    <form action="{{ route('front.portfolio.portfolio.update') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="category">Category <span class="m-l-5 text-danger">*</span></label>
                                    <select class="form-control" name="category">
                                        <option value="" hidden selected>Select...</option>
                                        @foreach ($category as $index => $item)
                                            <option value="{{ $item->title }}" {{ (old('category',$portfolio->category) == $item->title) ? 'selected' : '' }}>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="id" value="{{ $portfolio->id }}">
                                @error('category')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label class="control-label" for="title">Title <span class="m-l-5 text-danger">
                                        *</span></label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                    id="title" value="{{ old('title',$portfolio->title) }}" />

                                @error('title')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label class="control-label" for="tags">Tags (Comma separated values) <span class="m-l-5 text-danger">
                                    *</span></label>
                                <input class="form-control @error('tags') is-invalid @enderror" type="text" name="tags"
                                    id="tags" value="{{ old('tags',$portfolio->tags) }}" />
                                @error('tags')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label class="control-label" for="link">Url (Optional)</label>
                                <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" placeholder="eg: https://www.google.com/"
                                    id="link" value="{{ old('link',$portfolio->link) }}" />
                                @error('link')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label class="control-label" for="short_desc">Short Description <span class="m-l-5 text-danger">
                                    *</span><p class="m-l-5 text-danger"><small>(Max 200 characters)</small></p></label>
                                <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc',$portfolio->short_desc) }}</textarea>
                                @error('short_desc')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if ($portfolio->image != null)
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset($portfolio->image) }}" id="articleImage" class="img-fluid" alt="">
                                            </figure>
                                        @endif
                                    </div>
                                <div class="col-md-10">
                                <label class="control-label" for="image">Image <span class="m-l-5 text-danger">
                                    *</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div></div>
                        </div>

                        <br>

                        <div class="tile-footer">
                            <button class="saveBTN d-inline-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

                            <a href="{{ route('front.portfolio.portfolio.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa fa-fw fa-lg fa-chevron-left"></i> Back</a>

                            {{-- &nbsp;&nbsp;&nbsp; --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

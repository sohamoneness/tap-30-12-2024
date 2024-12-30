@extends('front.layouts.appprofile')
@section('title', 'Create Blog')

@section('section')

<section class="edit-sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ route('front.user.pitch.blog.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div> -->
            <div class="col-md-8 col-12">
                <!-- <div class="row"> -->
                    <div class="edit-basic-detail-content-wrap">
                        <!-- <div class="top-form-btn"> -->
                        <h3>Create Blog</h3>
                        <form action="{{ route('front.user.pitch.blog.store') }}" method="POST" role="form" enctype="multipart/form-data">@csrf
                            <!-- <div class="tile-body"> -->
                                <div class="form-group">
                                    <label class="control-label" for="title">Title <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" />
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Category (optional)</label>
                                    <select class="form-control" name="cat_id" >
                                        <option value="" hidden selected>Select</option>
                                        @foreach ($data as $index => $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('description')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Website Name (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="website_name" id="website_name">{{ old('website_name') }}</textarea>
                                    @error('website_name')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Website Description (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="website_description" id="website_description">{{ old('website_description') }}</textarea>
                                    @error('website_description')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="website_url">Website URL (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="website_url" id="website_url">{{ old('website_url') }}</textarea>
                                    @error('website_url')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email (optional)</label>
                                    <input type="text" class="form-control" rows="4" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="contact_form">Contact (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="contact_form" id="contact_form">{{ old('contact_form') }}</textarea>
                                    @error('contact_form')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="semrush_ranking">SEMRush Ranking (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="semrush_ranking" id="semrush_ranking">{{ old('semrush_ranking') }}</textarea>
                                    @error('semrush_ranking')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="domain_authority">Domain Authority (optional)</label>
                                    <textarea type="text" class="form-control" rows="4" name="domain_authority" id="domain_authority">{{ old('domain_authority') }}</textarea>
                                    @error('domain_authority')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="image"> Image <span class="m-l-5 text-danger">*</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                        id="image" value="{{ old('image') }}"/>

                                    @error('image')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="tile-footer">
                                    <button class="saveBTN d-inline-block" type="submit">
                                        <!-- <i class="fas fa-check-circle"></i>  -->
                                        Submit
                                    </button>
                                    <!-- <a class="saveBTN d-inline-block secondary-btn" href="{{ route('front.user.pitch.blog.category.index') }}"><i class="fas fa-chevron-left"></i>Back</a> -->
                                </div>
                            <!-- </div> -->
                        </form>
                        <!-- </div> -->
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
// $(function() {
//     alert();
    //$('#statusChange').hide();
    $('#status').change(function() {
        
        if ($('#status').val() == 'spare') {
            $('#statusChange').show();
        } else {
            $('#statusChange').hide();
        }
       
    });
// });
</script>
@endsection
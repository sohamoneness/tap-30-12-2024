@extends('front.layouts.appprofile')
@section('title', 'Create Blog Category')

@section('section')
<style>
    #statusChange {
        display: none;
    }
</style>
<section class="edit-sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ route('front.user.pitch.blog.category.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div> -->
            <div class="col-12 col-md-8">
                
                <div class="edit-basic-detail-content-wrap">
                    <!-- <div class="top-form-btn"> -->
                    <h3>Create Blog Category</h3>
                    <form action="{{ route('front.user.pitch.blog.category.store') }}" method="POST" role="form" enctype="multipart/form-data">@csrf
                        <div class="tile-body">
                            <div class="form-group">
                                <div class="row">
                            </div>
                        </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="title">Title <span class="m-l-5 text-danger">*</span></label>

                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" />

                                @error('title')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="description">Short Description (optional)</label>

                                <textarea type="text" class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <br>

                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit"><i class="fas fa-check-circle"></i> Save</button>
                                <a class="saveBTN d-inline-block secondary-btn" href="{{ route('front.user.pitch.blog.category.index') }}"><i class="fas fa-chevron-left"></i>Back</a>
                            </div>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
                
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
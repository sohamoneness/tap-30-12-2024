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
                <a href="{{ url('user/pitch/blogger/index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div> -->
            <div class="col-12 col-md-12">
                
                <div class="edit-basic-detail-content-wrap">
                    <!-- <div class="top-form-btn"> -->
                    <h3>Create Blogger</h3>
                    <form action="{{ url('user/pitch/blogger/store') }}" method="POST" role="form" enctype="multipart/form-data">@csrf
                        <div class="tile-body">
                            <div class="form-group">
                                <div class="row">
                            </div>
                        </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="name">Website Name<span class="m-l-5 text-danger">*</span></label>

                                <input class="form-control @error('website_name') is-invalid @enderror" type="text" name="website_name" id="website_name" value="{{ old('website_name') }}">

                                @error('website_name')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="description">Website Description</label>

                                <textarea type="text" class="form-control" rows="4" name="website_description" id="website_description"> {{ old('website_description') }}</textarea>

                                @error('website_description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                              <br>

                              {{-- <div class="form-group">
                                <label class="control-label" for="category">Category</label>

                                <input type="text" class="form-control" rows="4" name="category" id="category" value="{{ old('category') }}" >

                                @error('category')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label class="control-label" for="category">Category</label>
                            
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @foreach ($sum as $item)
                                        <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach    
                                </select>
                            
                                @error('category')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            

                            
                            
                            <br>

                            <div class="form-group">
                                <label class="control-label" for="domain">Domain Authority</label>

                                <input type="text" class="form-control" rows="4" name="domain_authority" id="domain_authority" value= "{{ old('domain_authority') }}">

                                @error('domain_authority')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="rank">Alexa Rank</label>

                                <input type="text" class="form-control" rows="4" name="alexa_rank" id="alexa_rank" value="{{ old('alexa_rank') }}" >

                                @error('alexa_rank')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="link">Link</label>

                                <input type="text" class="form-control" rows="4" name="link" id="link" value="{{ old('link') }}" >

                                @error('link')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label" for="email">email</label>

                                <input type="text" class="form-control" rows="4" name="email_address" id="email_address" value="{{ old('email_address') }}">

                                @error('email_address')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <div class="tile-footer">
                                <button class="saveBTN d-inline-block" type="submit"><i class="fas fa-check-circle"></i> Save</button>
                                <a class="saveBTN d-inline-block secondary-btn" href="{{ url('user/pitch/blogger/index') }}"><i class="fas fa-chevron-left"></i>Back</a>
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
@extends('front.layouts.appprofile')
@section('title', 'Edit Blog')

@section('section')
    <section class="edit-sec">
        <div class="container">
            <div class="row mt-0">
                <div class="col-12 mt-3 mb-3 text-end">
                    <a href="{{ route('front.user.pitch.blog.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i
                            class="fa-solid fa-chevron-left"></i> Back</a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8 mx-auto edit-basic-detail-content-wrap">
                            <div class="tile">
                                <span class="top-form-btn">
                                    <form action="{{ route('front.user.pitch.blog.update') }}" method="POST"
                                        role="form" enctype="multipart/form-data">@csrf
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <label class="control-label" for="title">Title <span class="m-l-5 text-danger">*</span></label>
            
                                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$data->title) }}" />
            
                                                @error('title')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
            
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="description">Category (optional)</label>
                                                <select class="form-control" name="cat_id" >
                                                    <option value="" hidden selected>Select</option>
                                                    @foreach ($cat as $index => $item)
                                                        <option value="{{ $item->id }}" {{$data->cat_id == $item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('cat_id')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="website_name">Website Name (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="website_name" id="website_name">{{ old('website_name',$data->website_name) }}</textarea>
                                                @error('website_name')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="description">Website Description (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="website_description" id="website_description">{{ old('website_description',$data->website_description) }}</textarea>
                                                @error('website_description')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
            
                                            <div class="form-group">
                                                <label class="control-label" for="website_url">Website URL (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="website_url" id="website_url">{{ old('website_url',$data->website_url) }}</textarea>
                                                @error('website_url')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email (optional)</label>
                                                <input type="text" class="form-control" rows="4" name="email" id="email" value="{{ old('email',$data->email) }}">
                                                @error('email')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="contact_form">Contact (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="contact_form" id="contact_form">{{ old('contact_form',$data->contact_form) }}</textarea>
                                                @error('contact_form')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="semrush_ranking">SEMRush Ranking (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="semrush_ranking" id="semrush_ranking">{{ old('semrush_ranking',$data->semrush_ranking) }}</textarea>
                                                @error('semrush_ranking')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="domain_authority">Domain Authority (optional)</label>
                                                <textarea type="text" class="form-control" rows="4" name="domain_authority" id="domain_authority">{{ old('domain_authority',$data->domain_authority) }}</textarea>
                                                @error('domain_authority')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <div class="col-4">
                                                        @if(!empty($data->image))
                                                            <img src="{{ asset($data->image) }}" width="180px" height="100px" style="border-radius:50%">
                                                        @endif
                                                    </div>
                                                    <div class="col-8">
                                                        <label class="control-label" for="image"> Image <span class="m-l-5 text-danger">*</span><p class="m-l-5 text-danger"><small>size must not exceeds 50KB</small></p></label>
                                                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"/>
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div><br>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <div class="tile-footer">
                                                <button class="saveBTN d-inline-block" type="submit"><i
                                                        class="fas fa-check-circle"></i> Save</button>

                                                <a class="saveBTN d-inline-block secondary-btn"
                                                    href="{{ route('front.user.pitch.blog.category.index') }}"><i
                                                        class="fas fa-chevron-left"></i>Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

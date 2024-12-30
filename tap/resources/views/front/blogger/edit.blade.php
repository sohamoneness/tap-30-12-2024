@extends('front.layouts.appprofile')
@section('title', 'Edit Blogger')

@section('section')
    <style>
        #statusChange {
            display: none;
        }
    </style>
    <section class="edit-sec">
        <div class="container">
            <div class="row mt-0">
                <div class="col-12 text-end">
                    <a href="{{ url('user/pitch/blogger/index') }}" class="add-btn-edit d-inline-block secondary-btn">
                        <i class="fa-solid fa-chevron-left"></i> Back
                    </a>
                </div>
                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-auto edit-basic-detail-content-wrap">
                            <div class="tile">
                                <span class="top-form-btn">
                                    <form action="{{ url('user/pitch/blogger/update', $blogger->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <label class="control-label" for="website_name">Website Name<span class="m-l-5 text-danger">*</span></label>
                                                <input class="form-control @error('website_name') is-invalid @enderror" type="text" name="website_name" id="website_name" value="{{ old('website_name', $blogger->website_name) }}">
                                                @error('website_name')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="website_description">Website Description</label>
                                                <textarea type="text" class="form-control" rows="4" name="website_description" id="website_description">{{ old('website_description', $blogger->website_description) }}</textarea>
                                                @error('website_description')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="category">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Select a Category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" {{ old('category', $blogger->category) == $item->id ? 'selected' : '' }}>
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
                                                <label class="control-label" for="domain_authority">Domain Authority</label>
                                                <input type="text" class="form-control" name="domain_authority" id="domain_authority" value="{{ old('domain_authority', $blogger->domain_authority) }}">
                                                @error('domain_authority')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="alexa_rank">Alexa Rank</label>
                                                <input type="text" class="form-control" name="alexa_rank" id="alexa_rank" value="{{ old('alexa_rank', $blogger->alexa_rank) }}">
                                                @error('alexa_rank')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="link">Link</label>
                                                <input type="text" class="form-control" name="link" id="link" value="{{ old('link', $blogger->link) }}">
                                                @error('link')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="email_address">Email Address</label>
                                                <input type="text" class="form-control" name="email_address" id="email_address" value="{{ old('email_address', $blogger->email_address) }}">
                                                @error('email_address')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>

                                            <input type="hidden" name="id" value="{{ $blogger->id }}">
                                            <div class="tile-footer">
                                                <button class="saveBTN d-inline-block" type="submit">
                                                    <i class="fas fa-check-circle"></i> Save
                                                </button>
                                                <a class="saveBTN d-inline-block secondary-btn" href="{{ url('user/pitch/blogger/index') }}">
                                                    <i class="fas fa-chevron-left"></i> Back
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade @if($blogger->status === 'completed') show @endif" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Example of status change handler
        $('#status').change(function() {
            if ($('#status').val() == 'spare') {
                $('#statusChange').show();
            } else {
                $('#statusChange').hide();
            }
        });
    </script>
@endsection

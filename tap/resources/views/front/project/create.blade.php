@extends('front.layouts.appprofile')
@section('title', 'Create Project')

@section('section')
<style>
    #statusChange {
        display: none;
    }
    input[type="datetime-local"] {
        background: #fff;
        min-width: 200px;
        /* position: relative; */
    }

    input[type="datetime-local"]:before {
        content: 'HH:MM:SS';
        color: #9d9d9d;
        position: absolute;
        background: #fff;
        width: 150px;
        left: 35%;
        /* top: 7px; */
        color: #111;
    }

    input[type="datetime-local"]:focus:before {
        width: 0;
        content: '';
    }
</style>
<section class="edit-sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ route('front.project.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div> -->
            <div class="col-md-8 col-12">
                <!-- <div class="row"> -->
                    <!-- <div class="col-md-8"> -->
                        <div class="edit-basic-detail-content-wrap">
                            <!-- <div class="top-form-btn"> -->
                                <h3>Create Project</h3>
                                <form action="{{ route('front.project.store') }}" method="POST" role="form" enctype="multipart/form-data">@csrf
                                    <!-- <div class="tile-body"> -->
                                        <div class="form-group">
                                            <div class="row">
                                                {{-- <div class="col-md-8">
                                                    <label class="control-label" for="title">Status : 
                                                        <strong>{{ $data->status }}</strong>
                                                    </label>
                                                </div> --}}

                                                {{-- <div class="col-md-4">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" disabled>Change Status</option>
                                                        @foreach ($status as $item)
                                                            <option value="{{$item->slug}}" {{ ($item->slug == "icebox") ? 'checked' : '' }}>{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                            {{-- @error('status')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    <!-- </div> -->
                                        <div class="form-group">
                                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger">*</span></label>

                                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" />
        
                                            @error('title')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="short_desc">Short Description (optional)</label>

                                            <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc') }}</textarea>

                                            @error('short_desc')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="document">Document (optional)<span class="warn-text">size must not exceeds 2MB</span></label>
                                            <input class="form-control @error('document') is-invalid @enderror" type="file" id="document" name="document"/>
                                            @error('document')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                            <p class="info-text">Upload any project related document, if any. You can also download it later.</p>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="control-label" for="deadline">Deadline <span class="m-l-5 text-danger">*</span></label>
                                                <input class="form-control @error('deadline') is-invalid @enderror" type="datetime-local" value="" id="deadline" name="deadline" min="{{ now()->format('Y-m-d H:i') }}" placeholder="HH:MM:SS">
                                                @error('deadline')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label class="control-label" for="client_id">
                                                    Client 
                                                    <span class="m-l-5 text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="client_id">
                                                    <option value="" hidden selected>Select</option>
                                                    @foreach ($client as $index => $item)
                                                        <option value="{{ $item->id }}" {{old('client_id') == $item->id ? 'selected' : ''}} >{{ $item->client_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('client_id')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{--<div class="form-group">
                                            <label class="control-label" for="client_id">Client <span class="m-l-5 text-danger">
                                                    *</span></label>
                                                    <select class="form-control" name="client_id">
                                                        <option value="" hidden selected>Select</option>
                                                        @foreach ($client as $index => $item)
                                                            <option value="{{ $item->id }}" {{old('client_id') == $item->id ? 'selected' : ''}} >{{ $item->client_name }}</option>
                                                        @endforeach
                                                </select>
                                            @error('client_id')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>--}}
                                        <div class="tile-footer">
                                            <button class="saveBTN d-inline-block" type="submit">
                                                <!-- <i class="fas fa-check-circle"></i> -->
                                                Submit
                                            </button>
                                            <!-- <a class="saveBTN d-inline-block secondary-btn" href="{{ route('front.project.index') }}"><i class="fas fa-chevron-left"></i>Back</a> -->
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    <!-- </div> -->
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
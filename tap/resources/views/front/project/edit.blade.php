@extends('front.layouts.appprofile')
@section('title', 'Edit Project')

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
                    <a href="{{ route('front.project.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i
                            class="fa-solid fa-chevron-left"></i> Back</a>
                </div> -->
                <div class="col-md-8 col-12">
                    <div class="row">
                        <div class="edit-basic-detail-content-wrap">
                            <!-- <div class="top-form-btn"> -->
                                <h3>Edit Project</h3>
                                <form action="{{ route('front.project.update', $data->id) }}" method="POST"
                                    role="form" enctype="multipart/form-data">@csrf
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
                                                        <option value="" disabled selected>Change Status</option>
                                                        @foreach ($status as $item)
                                                        
                                                            <option value="{{ $item->slug }}">{{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                            </div>
                                            
                                            {{-- <div id="statusChange" class="row">
                                                <div class="offset-8 col-md-4">
                                                    <label class="control-label" for="status">
                                                        <span
                                                            class="m-l-5 text-danger"></span></label>
                                                    <input
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        type="text" name="other_status"
                                                        value="{{ old('status',$data->other_status) }}" />
                                                    @error('status')
                                                        <p class="small text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                                
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="title">Title <span
                                                    class="m-l-5 text-danger">*</span></label>

                                            <input class="form-control @error('title') is-invalid @enderror"
                                                type="text" name="title" id="title"
                                                value="{{ old('title') ? old('title') : $data->title }}" />

                                            @error('title')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="short_desc">Short Description
                                                (optional)</label>

                                            <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc') ? old('short_desc') : $data->short_desc }}</textarea>

                                            @error('short_desc')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex justify-content-between flex-wrap">
                                                <label class="control-label" for="document">Document (optional)<p class="ms-auto mb-0 text-danger"><small>size must not exceeds 2MB</small></p></label>
                                                @if ($data->document)
                                                    <a href="{{ asset($data->document) }}" class="text-success"
                                                        download>View Previous Document</a>
                                                @endif
                                            </div>

                                            <input class="form-control @error('document') is-invalid @enderror"
                                                type="file" id="document" name="document" />

                                            @error('document')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror

                                            <p class="mt-2 text-muted"><small>Upload any project related document, if
                                                    any. You can also download it later.</small></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="deadline">Deadline <span class="m-l-5 text-danger">*</span></label>
                                            <input class="form-control @error('deadline') is-invalid @enderror" type="datetime-local" value="{{date('Y-m-d H:i',strtotime(old('deadline') ?? $data->deadline))}}" id="deadline" name="deadline" min="{{ now()->format('Y-m-d H:i') }}"/>
                                            @error('deadline')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="client_id">Client <span class="m-l-5 text-danger">
                                                    *</span></label>
                                                    <select class="form-control" name="client_id">
                                                        <option value="" hidden selected>Select</option>
                                                        @foreach ($client as $index => $item)
                                                            <option value="{{ $item->id }}" {{$data->client_id == $item->id ? 'selected' : ''}} >{{ $item->client_name }}</option>
                                                        @endforeach
                                                </select>
                                            @error('client_id')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="tile-footer">
                                            <button class="saveBTN d-inline-block" type="submit">
                                                <!-- <i class="fas fa-check-circle"></i> -->
                                                Submit
                                            </button>

                                            <!-- <a class="saveBTN d-inline-block secondary-btn"
                                                href="{{ route('front.project.index') }}"><i
                                                    class="fas fa-chevron-left"></i>Back</a> -->
                                        </div>
                                    <!-- </div> -->
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal fade @if($data->status === 'completed') show @endif"
         id="myExampleModal"
         style="display: @if($data->status === 'completed')
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Modal Content</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button class="btn btn-secondary"
                            type="button"
                            wire:click.prevent="doSomething()">Do Something</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show"
         id="backdrop"
         ></div>
</div> --}}

<div class="modal fade @if($data->status === 'completed') show @endif" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

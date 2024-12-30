@extends('front.layouts.appprofile')
@section('title', 'Edit Blog Category')

@section('section')
    <style>
        #statusChange {
            display: none;
        }
    </style>
    <section class="edit-sec">
        <div class="container">
            <div class="row mt-0">
                <div class="col-12 mt-3 mb-3 text-end">
                    <a href="{{ route('front.user.pitch.blog.category.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i
                            class="fa-solid fa-chevron-left"></i> Back</a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8 mx-auto edit-basic-detail-content-wrap">
                            <div class="tile">
                                <span class="top-form-btn">
                                    <form action="{{ route('front.user.pitch.blog.category.update') }}" method="POST"
                                        role="form" enctype="multipart/form-data">@csrf
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    
                                                </div>
                                                    
                                            </div>

                                            <br>

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

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label" for="description">Short Description
                                                    (optional)</label>

                                                <textarea type="text" class="form-control" rows="4" name="description" id="description">{{ old('description') ? old('description') : $data->description }}</textarea>

                                                @error('description')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>
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

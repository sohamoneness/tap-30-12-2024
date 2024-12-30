@extends('front.layouts.appprofile')
@section('title', 'Edit Advertisement')

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
                    <a href="{{ route('front.advertisement.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i
                            class="fa-solid fa-chevron-left"></i> Back</a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8 mx-auto edit-basic-detail-content-wrap">
                            <div class="tile">
                                <span class="top-form-btn">
                                    <form action="{{ route('front.advertisement.update', $data->id) }}" method="POST"
                                        role="form" enctype="multipart/form-data">@csrf
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <label class="control-label" for="category">Category <span class="m-l-5 text-danger">
                                                        *</span></label>
                                                        <select class="form-control" name="article_category_id">
                                                            <option value="" hidden selected>Select</option>
                                                            @foreach ($status as $index => $item)
                                                                <option value="{{ $item->id }}" {{ $item->id == $data->article_category_id ? 'selected' : ''}} >{{ $item->title }}</option>
                                                            @endforeach
                                                    </select>
                                                @error('category')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div><br>

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
                                                <label class="control-label" for="short_desc">Content Brief</label>

                                                <textarea type="text" class="form-control" rows="4" name="short_desc" id="short_desc">{{ old('short_desc') ? old('short_desc') : $data->short_desc }}</textarea>

                                                @error('short_desc')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="short_desc">Words Required</label>
        
                                                <input class="form-control @error('words_required') is-invalid @enderror" type="number" name="words_required" id="words_required" value="{{ old('words_required') ? old('words_required') : $data->words_required }}" />
        
                                                @error('words_required')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="max_writers">Allowed Writes (MAX) </label>
        
                                                <input class="form-control @error('max_writers') is-invalid @enderror" type="number" name="max_writers" id="max_writers" value="{{ old('max_writers') ? old('max_writers') : $data->max_writers }}" />
        
                                                @error('max_writers')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
        
        
                                            <div class="form-group">
                                                <label class="control-label" for="short_desc">Budget</label>
        
                                                <input type="radio" id="budget1" name="budget" value="0" {{ $data->budget == 0 ? 'checked' : ''}}>
                                                <label for="budget1"> Paid</label>
                                                <input type="radio" id="budget2" name="budget" value="1" {{ $data->budget == 1 ? 'checked' : ''}}>
                                                <label for="budget2"> Free</label><br>
        
                                                @error('short_desc')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
        
                                            <br>
                                            <div class="form-group budget_amount">
                                                <label class="control-label" for="budget_amount">Budget Amount*</label>
                                                <input class="form-control @error('budget_amount') is-invalid @enderror" type="number" id="budget_amount" name="budget_amount" value="{{ old('budget_amount') ? old('budget_amount') : $data->budget_amount }}"/>
                                                @error('budget_amount')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                    
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="primary_keyword">Primary Keyword </label>
        
                                                <input class="form-control @error('primary_keyword') is-invalid @enderror" type="text" name="primary_keyword" id="primary_keyword" value="{{ old('primary_keyword') ? old('primary_keyword') : $data->primary_keyword }}" />
        
                                                @error('primary_keyword')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="secondary_keyword">Secondary Keyword </label>
        
                                                <input class="form-control @error('secondary_keyword') is-invalid @enderror" type="text" name="secondary_keyword" id="secondary_keyword" value="{{ old('secondary_keyword') ? old('secondary_keyword') : $data->secondary_keyword }}" />
        
                                                @error('secondary_keyword')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="writer_type">Writer Type <span class="m-l-5 text-danger">
                                                        *</span></label>
                                                        <select class="form-control" name="writer_type">
                                                            <option value="" hidden selected>Select</option>
                                                            <option value="beginner" {{ $data->writer_type === 'beginner' ? 'selected' : ''}}>Beginner</option>
                                                            <option value="intermediate" {{ $data->writer_type === 'intermediate' ? 'selected' : ''}}>Intermediate</option>
                                                            <option value="expert" {{ $data->writer_type === 'expert' ? 'selected' : ''}}>Expert</option>
                                                    </select>
                                                @error('writer_type')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div><br>
                                            <div class="form-group">
                                                <label class="control-label" for="writer_link">Writer Link</label>
        
                                                <input class="form-control @error('writer_link') is-invalid @enderror" type="text" name="writer_link" id="writer_link" value="{{ old('writer_link') ? old('writer_link') : $data->writer_link }}" />
        
                                                @error('writer_link')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="client_name">Client Name</label>
        
                                                <input class="form-control @error('client_name') is-invalid @enderror" type="text" name="client_name" id="client_name" value="{{ old('client_name') ? old('client_name') : $data->client_name }}" />
        
                                                @error('client_name')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="client_website">Client Website</label>
        
                                                <input class="form-control @error('client_website') is-invalid @enderror" type="text" name="client_website" id="client_website" value="{{ old('client_website') ? old('client_website') : $data->client_website }}" />
        
                                                @error('client_website')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="client_stats">Client Stats</label>
        
                                                <input class="form-control @error('client_stats') is-invalid @enderror" type="text" name="client_stats" id="client_stats" value="{{ old('client_stats') ? old('client_stats') : $data->client_stats }}" />
        
                                                @error('client_stats')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label" for="client_stats">Domain Authority </label>
        
                                                <input class="form-control @error('domain_authority') is-invalid @enderror" type="text" name="domain_authority" id="domain_authority" value="{{ old('domain_authority') ? old('domain_authority') : $data->domain_authority }}" />
        
                                                @error('domain_authority')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>
                                       

                                            <div class="form-group">
                                                <label class="control-label" for="deadline">Deadline <span class="m-l-5 text-danger">*</span></label>
                                                <input class="form-control @error('deadline') is-invalid @enderror" type="datetime-local" value="{{date('Y-m-d H:i',strtotime(old('deadline') ?? $data->deadline))}}" id="deadline" name="deadline"/>
                                                @error('deadline')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <br>

                                            <div class="tile-footer">
                                                <button class="saveBTN d-inline-block" type="submit"><i
                                                        class="fas fa-check-circle"></i> Save</button>

                                                <a class="saveBTN d-inline-block secondary-btn"
                                                    href="{{ route('front.project.index') }}"><i
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

@extends('admin.app')
@section('title')
    {{ $pageTitle }}
@endsection
@section('content')
    {{-- Multiselect css and script  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
            <span class="top-form-btn">

            <a class="btn btn-secondary" href="{{ route('admin.glossary.index') }}"><i
                    class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
            </span>
                <h3 class="tile-title">{{ $subTitle }}
                </h3>
                <hr>
                <form action="{{ route('admin.glossary.update') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  name="id" value="{{$glossary->id}}">
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pin"> Category <span class="m-l-5 text-danger">
                                    *</span></label>
                            <select class="form-control" name="type_id">
                                @foreach ($glossaryTypes as $index => $item)
                                    <option value="{{ $item->id }}" @if($glossary->type_id==$item->id){{"selected"}}@endif>{{ $item->title }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Term <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control @error('term') is-invalid @enderror" type="text" name="term"
                                id="term" value="{{ old('term',$glossary->term) }}" />
                            @error('term')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Definition<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="definition" id="definition">{{ old('definition',$glossary->definition) }}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Brief Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="brief_description" id="brief_description">{{ old('brief_description',$glossary->brief_description) }}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Detailed Explaination<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="description" id="description">{{ old('description',$glossary->description) }}</textarea>
                            
                        </div>
                        <label class="control-label">Usage Examples<span class="m-l-5 text-danger"> *</span></label>
                        <table class="search_table">
                            
                            <tbody id="time-tbody1">
                                @foreach($glossaryScenarios as $scenario)
                                <tr>
                                    <td>
                                        <label class="control-label" for="name">Scenario </label>
                                        <textarea type="text" class="form-control scenario" rows="4" name="scenario[]" id="">{{$scenario->scenario}}</textarea>
                                    </td>
                                    <td>
                                        <label>Explanation </label>
                                        <textarea type="text" class="form-control explanation" rows="4" name="explanation[]" id="">{{$scenario->explanation}}</textarea>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit a-add1">Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger a-rm1">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label class="control-label" for="name">Frequency Of Use <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="frequency_of_use"
                                id="frequency_of_use" value="{{ old('frequency_of_use',$glossary->frequency_of_use) }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Frequency Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="frequency_description" id="frequency_description">{{ old('frequency_description',$glossary->frequency_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Importance Of Term <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="importance_of_term"
                                id="importance_of_term" value="{{ old('importance_of_term',$glossary->importance_of_term) }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Importance Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="importance_description" id="importance_description">{{ old('importance_description',$glossary->importance_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Meta Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="meta_title"
                                id="meta_title" value="{{ old('meta_title',$glossary->meta_title) }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Meta Keywords<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ old('meta_keywords',$glossary->meta_keywords) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Meta Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="meta_description" id="meta_description">{{ old('meta_description',$glossary->meta_description) }}</textarea>
                        </div>
                        
                    </div><br>
                    
                   
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Data</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.article.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script type="text/javascript">
     $('#description').summernote({
         height: 400
     });

     $('#definition').summernote({
         height: 400
     });
     
     $('#brief_description').summernote({
         height: 400
     });

    $('.scenario').summernote({
         height: 400
     });

      $('.explanation').summernote({
         height: 400
     });

      $('.short_course_exercise_descriptions').summernote({
         height: 400
     });

    $('body').on('click','a.a-add1',function(e){
        //alert("hello");
        var html = '<tr>\
                        <td>\
                            <label class="control-label" for="name">Scenario </label>\
                            <textarea type="text" class="form-control scenario" rows="4" name="scenario[]" id=""></textarea>\
                        </td>\
                        <td>\
                            <label>Explanation </label>\
                            <textarea type="text" class="form-control explanation" rows="4" name="explanation[]" id=""></textarea>\
                        </td>\
                        <td>\
                            <a href="javascript:void(0);" class="btn btn-submit a-add1">Add</a>\
                            <a href="javascript:void(0);" class="btn btn-danger a-rm1">Remove</a>\
                        </td>\
                    </tr>';

        $('#time-tbody1').append(html);

         
      $('.scenario').summernote({
         height: 400
     });

      $('.explanation').summernote({
         height: 400
     });
    })

    $('body').on('click','a.a-rm1',function(e){
        $(this).parent().parent().remove();
    }); 
 </script>
@endpush

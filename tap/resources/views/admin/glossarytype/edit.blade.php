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

            <a class="btn btn-secondary" href="{{ route('admin.glossarytype.index') }}"><i
                    class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
            </span>
                <h3 class="tile-title">{{ $subTitle }}
                </h3>
                <hr>
                <form action="{{ route('admin.glossarytype.update') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  name="id" value="{{$glossaryType->id}}">
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title',$glossaryType->title) }}" />
                            @error('title')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label" for="name">Meta Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="meta_title"
                                id="meta_title" value="{{ old('meta_title',$glossaryType->meta_title) }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Meta Keywords<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ old('meta_keywords',$glossaryType->meta_keywords) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Meta Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="meta_description" id="meta_description">{{ old('meta_description',$glossaryType->meta_description) }}</textarea>
                        </div>
                        
                    </div><br>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Data</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.glossarytype.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script>
        $('select[name="article_category_id[]"]').select2({
            placeholder: "Select Category"
        });
		$('select[name="article_category_id[]"]').on('change', (event) => {
			var value = $('select[name="article_category_id[]"]').val();
			$.ajax({
				url: '{{url("/")}}/api/subcategory/'+value,
                method: 'GET',
                success: function(result) {
					var content = '';
					var slectTag = 'select[name="article_sub_category_id"]';
					var displayCollection = (result.data.cat_name == "all") ? "All Subcategory" : " Select ";

					content += '<option value="" selected>'+displayCollection+'</option>';
					$.each(result.data.subcategory, (key, value) => {
						content += '<option value="'+value.subcategory_id+'">'+value.subcategory_title+'</option>';
					});
					$(slectTag).html(content).attr('disabled', false);
                }
			});
		});

       

       
    </script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script type="text/javascript">
     $('#key_learnings').summernote({
         height: 400
     });

      $('.short_course_module_resources').summernote({
         height: 400
     });

     //  $('.faq_answers').summernote({
     //     height: 400
     // });

      $('.short_course_exercise_descriptions').summernote({
         height: 400
     });

    $('body').on('click','a.a-add1',function(e){
        //alert("hello");
        var html = '<tr>\
                                <td>\
                                    <label class="control-label" for="name">Title </label>\
                                    <input class="form-control" type="text" name="faq_questions[]" id="" value="" />\
                                </td>\
                                <td>\
                                    <label>Description </label>\
                                    <textarea type="text" class="form-control faq_answers" rows="4" name="faq_answers[]" id=""></textarea>\
                                </td>\
                                <td>\
                                    <a href="javascript:void(0);" class="btn btn-submit a-add1">Add</a>\
                                    <a href="javascript:void(0);" class="btn btn-danger a-rm1">Remove</a>\
                                </td>\
                            </tr>';

        $('#time-tbody1').append(html);

         // $('.faq_answers').summernote({
         //     height: 400
         // });
    })

    $('body').on('click','a.a-rm1',function(e){
        $(this).parent().parent().remove();
    }); 
 </script>
@endpush
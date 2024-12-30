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

            <a class="btn btn-secondary" href="{{ route('admin.article.edit',$request->blog_id) }}"><i
                    class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
            </span>
                <h3 class="tile-title">{{ $subTitle }}
                </h3>
                <hr>
                <form action="{{ route('admin.article.content.store') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $request->blog_id }}"> 
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title') }}" />
                            @error('title')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="content">Content<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control ckeditor" rows="4" name="content" id="editor1">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="type"> Type </label>
                            <select class="form-control" name="type">
                                    <option value="select" disabled>Select</option>
                                    <option value="1" >Content</option>
                                    <option value="2" >Key factor</option>
                                    <option value="3" >Case study</option>
                            </select>
                            @error('type') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                    <br>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                            Article</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.article.edit',$request->blog_id) }}"><i
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
     $('#content').summernote({
         height: 400
     });
     $('#meta_description').summernote({
         height: 400
     });
 </script>
  <script src="https://cdn.ckeditor.com/4.21.0/standard-all/ckeditor.js"></script>
  {{-- <script>
      CKEDITOR.plugins.addExternal('simplebox', 'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/', 'plugin.js');

      const watchdog = new CKSource.EditorWatchdog();
      window.watchdog = watchdog;
      
      watchdog.setCreator( ( element, config ) => {
  
         // config.extraPlugins = 'simplebutton';
         // config.allowedContent = true;
           
          return CKSource.Editor
              .create( element, config )
              .then( editor => {
                  return editor;
              } )
      });
      watchdog.setDestructor( editor => {
          return editor.destroy();
      });
  
      watchdog.on( 'error', handleError );
      watchdog
          .create( document.querySelector( '.ckeditor' ), {
              licenseKey: '',
          } )
          .catch( handleError );
  
      function handleError( error ) {
          console.error( 'Oops, something went wrong!' );
          console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
          console.warn( 'Build id: dundmb20fh0i-hqryd5mcylgl' );
          console.error( error );
      }
  </script> --}}
   <script>
      CKEDITOR.plugins.addExternal('simplebox', 'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/', 'plugin.js');
  
      CKEDITOR.replace('editor1', {
  
        // Add the Simple Box plugin.
        extraPlugins: 'simplebox',
      
        // Besides editor's main stylesheet load also simplebox styles.
        // In the usual case they can be added to the main stylesheet.
        contentsCss: [
          'http://cdn.ckeditor.com/4.21.0/full-all/contents.css',
          'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/styles/contents.css'
        ],
  
        // Set height to make more content visible.
        height: 500,
        removeButtons: 'PasteFromWord'
      });
     
    </script>
@endpush
